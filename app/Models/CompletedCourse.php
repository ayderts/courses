<?php

namespace App\Models;

use App\Constants\DurationConstant;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Pion\Support\Eloquent\Position\Traits\PositionTrait;

class CompletedCourse extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'results',
    ];

    public function course() {
        return $this->belongsTo(Course::class, 'name');
    }

    public function getCourseAttribute($courseId) {
        return Course::find($courseId);
    }

    public function getCourseNameAttribute($courseId) {
        return $this->getCourseAttribute($courseId)->name;
    }

    public function getGroupNameAttribute($courseId) {
        return CourseGroups::where('course_id', $courseId)->value('group_name');
    }

    public function getImageUrlPathAttribute($courseId) {
        $course = $this->getCourseAttribute($courseId);
        if (empty($course->image_url)) {
            return "";
        }
        return env('APP_URL') . '/' . $course->image_url;
    }

    public function getStartDateAttribute($courseId) {
        return $this->getCourseAttribute($courseId)->date_from;
    }

    public function getEndDateAttribute($courseId) {
        return $this->getCourseAttribute($courseId)->date_to;
    }

    public function getFormatAttribute($courseId) {
        return $this->getCourseAttribute($courseId)->course_type;
    }

    public function getFormattedDateAttribute($date) {
        return date('d.m.Y', strtotime($date));
    }

    protected $table = 'completed_courses';
}
