<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestResultRequest;
use App\Http\Resources\CoachHomeworkResource;
use App\Http\Resources\TestResultResourceOLD;
use App\Services\TestService;
use Illuminate\Http\Request;

class TestResultController extends Controller
{
    public TestService $testService;

    public function __construct(TestService $testService)
    {
        $this->middleware('auth:api');
        $this->testService = $testService;
    }


    public function store(TestResultRequest $request)
    {
        return TestResultResourceOLD::make($this->testService->storeResult($request));
    }

    public function show(Request $request)
    {

        //return $this->testService->showResult($request);
        return TestResultResourceOLD::make($this->testService->showResult($request));
    }
}
