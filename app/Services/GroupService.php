<?php

namespace App\Services;

use App\Models\CourseGroup;
use Illuminate\Http\Request;

class GroupService
{
    public function showManager(Request $request, $group_id)
    {
        $group = CourseGroup::findOrFail($group_id);
        return $group->manager;
    }

}
