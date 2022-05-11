<?php

namespace App\Http\Controllers;

use App\Http\Resources\TestResource;
use App\Http\Resources\TestResultResource;
use App\Models\Test;
use App\Models\TestQuestion;
use App\Models\TestResult;
use App\Services\TestService;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public TestService $testService;

    public function __construct(TestService $testService)
    {
        $this->middleware('auth:api');
        $this->testService = $testService;
    }

    public function show($homework_id): TestResource
    {
        return TestResource::make($this->testService->show($homework_id));
    }

    public function storeResponse(Request $request, $homework_id): TestResultResource
    {
        return TestResultResource::make($this->testService->storeResponse($request, $homework_id));
    }

    public function showResult(Request $request, $homework_id): TestResultResource
    {
        return TestResultResource::make($this->testService->showResult($request, $homework_id));
    }
}
