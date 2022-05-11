<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Pion\Support\Eloquent\Position\Traits\PositionTrait;

class CourseListeners extends Model
{
    use HasFactory, SoftDeletes, PositionTrait;

    protected $fillable = [
        'email',
        'full_name',
        'job_position',
        'role',
        'personal_phone_number',
        'job_phone_number',
        'company',
        'division',
        'project',
        'employee_type',
        'erp_identifier',
        'employee_number',
        'employee_code',
        'employee_level',
        'job_position_level_top',
        'job_position_family',
        'employee_grading'
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function courseGroups(): BelongsTo
    {
        return $this->belongsTo(CourseGroup::class);
    }

    public function groupStudents(): BelongsToMany
    {
        return $this->belongsToMany(GroupStudent::class, 'ref_listeners_group_students')
            ->withTimestamps();
    }

}
