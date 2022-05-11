<?php

namespace App\Http\Controllers;

use App\Services\CoachTestService;
use Illuminate\Http\Request;

class CoachTestController extends Controller
{
    public CoachTestService $coachTestService;

    /**
     * @param CoachTestService $coachTestService
     */
    public function __construct(CoachTestService $coachTestService)
    {
        $this->coachTestService = $coachTestService;
    }


    public function store()
    {

    }

    public function index()
    {

    }
}
