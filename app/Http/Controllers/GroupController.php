<?php

namespace App\Http\Controllers;

use App\Http\Resources\AllGroupsResource;
use App\Http\Resources\ManagerResource;
use App\Models\Course;
use App\Models\CourseGroup;
use App\Services\GroupService;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public GroupService $groupService;

    public function __construct(GroupService $groupService)
    {
        $this->groupService = $groupService;
    }

    public function index(): AllGroupsResource
    {
        return AllGroupsResource::make(Course::query()->has('groups')->get());
    }
}
