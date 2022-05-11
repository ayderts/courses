<?php

namespace Database\Factories;

use App\Models\TestAnswer;
use App\Models\TestQuestion;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestAnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $testQuestionId = TestQuestion::query()->withCount('answers')->get()->where('answers_count', '<', 4)->random()->id;
        $currentIsCorrect = false;
        $countCorrect = TestAnswer::query()->where('test_question_id', $testQuestionId)->where('is_correct', '=', true)->count();
        $answerCount = TestAnswer::query()->where('test_question_id', $testQuestionId)->count();
        if ($countCorrect === 0 && $answerCount > 3) {
            $currentIsCorrect = $this->faker->boolean();
        } elseif ($countCorrect === 0 && $answerCount === 3) {
            $currentIsCorrect = true;
        }
        return [
            'name' => $this->faker->text(15),
            'is_correct' => $currentIsCorrect,
            'test_question_id' => $testQuestionId,
        ];
    }
}
