<?php

namespace App\Services;

use App\Http\Resources\TestResource;
use App\Http\Resources\TestResultResource;
use App\Models\Test;
use App\Models\TestQuestion;
use App\Models\TestResult;
use Illuminate\Http\Request;

class TestService
{
    public function show($homework_id)
    {
        $test = Test::query()->where('homework_id', $homework_id)->firstOrFail();
        return $test;
    }

    public function storeResponse(Request $request, $homework_id)
    {
        $user = auth('api')->user();
        $correctAnswerNumber = 0;
        $test = Test::query()->where('homework_id', $homework_id)->firstOrFail();
        foreach ($request->input('responses') as $answer) {
            $question = TestQuestion::findOrFail($answer['question_id']);
            if (!$test->questions->contains($question)) continue;
            $userAnswers = $answer['answers'];
            $questionAnswers = $question->answers()->where('is_correct', '=', true)->pluck('id')->toArray();
            sort($userAnswers);
            sort($questionAnswers);
            if ($userAnswers === $questionAnswers) $correctAnswerNumber++;
        }
        $score = ($correctAnswerNumber / $test->questions->count()) * 100;
        $isPassed = $this->checkIfPassed($score, $test);
        $result = TestResult::query()->updateOrCreate(['user_id' => $user->id, 'test_id' => $test->id], ['score' => $score, 'user_id' => $user->id, 'test_id' => $test->id, 'is_passed' => $isPassed]);
        return $result;
    }

    public function checkIfPassed($score, $test): bool
    {
        return $score >= $test->minimum_score_to_pass;
    }

    public function showResult(Request $request, $homework_id)
    {
        $user = auth('api')->user();
        $test = Test::query()->where('homework_id', $homework_id)->firstOrFail();
        return TestResult::query()->where('user_id', $user->id)->where('test_id', $test->id)->firstOrFail();
    }
}
