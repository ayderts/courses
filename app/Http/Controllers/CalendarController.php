<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalendarIndexRequest;
use App\Http\Resources\CalendarLessonResource;
use App\Services\CalendarService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CalendarController extends Controller
{
    private CalendarService $calendarService;

    public function __construct(CalendarService $calendarService)
    {
        $this->middleware('auth:api');
        $this->calendarService = $calendarService;
    }

    public function index(CalendarIndexRequest $request): AnonymousResourceCollection
    {
        return CalendarLessonResource::collection($this->calendarService->index($request));
    }
}
