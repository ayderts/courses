<?php

namespace App\Http\Controllers;

use App\Http\Resources\AttendanceResource;
use App\Http\Resources\CoachResource;
use App\Http\Resources\TestResultResourceOLD;
use App\Models\Coach;
use App\Services\AttendanceService;
use App\Services\TestService;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function __construct(AttendanceService $attendanceService)
    {
        $this->middleware('auth:api');
        $this->attendanceService = $attendanceService;
    }
    public function store(Request $request){

        return AttendanceResource::make($this->attendanceService->store($request));
    }
    public function show(Request $request){

        return AttendanceResource::collection($this->attendanceService->show($request));
    }
}
