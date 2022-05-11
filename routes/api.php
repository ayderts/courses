<?php

use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\ProfileController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\CoachHomeworkController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseGroupStudentController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\HomeworkFeedbackController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestResultController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('api/v1')->group(function () {
    Route::get('calendar', [CalendarController::class, 'index'])->name('calendar.index');
    Route::get('courses/{course_id}/lessons/{lesson_id}', [LessonController::class, 'show']);
//    Route::get('courses/{course_id}/lessons/{lesson_id}/my-answers', [LessonController::class, 'indexAnswer']);
    Route::get('courses/{course_id}/lessons/{lesson_id}/my-mark', [LessonController::class, 'showMark']);
    Route::post('courses/{course_id}/lessons/{lesson_id}', [HomeworkController::class, 'storeAnswer']); //upload homework answer
    Route::get('menus', [MenuController::class, 'index'])->name('menu.all');
    Route::get('menus/{identificator}', [MenuController::class, 'determine'])->name('menu.determine');
    Route::post('upload', [UploadController::class, 'store'])->name('upload.store');
    Route::get('download', [DownloadController::class, 'download'])->name('download.get');
    Route::get('tests/{homework_id}', [TestController::class, 'show']);
    Route::get('tests/{homework_id}/result', [TestController::class, 'showResult']);
    Route::post('tests/{homework_id}/response', [TestController::class, 'storeResponse']);
    Route::get('my-progress/{course_id}', [CourseController::class, 'courseProgress']);
    Route::get('my-score/{course_id}', [CourseController::class, 'courseScore']);
    Route::get('books', [LibraryController::class, 'index']);
    Route::get('books/{id}', [LibraryController::class, 'show']);


//    Route::post('test/result', [TestResultController::class, 'store'])->name('test-result.store');
//    Route::get('test/results', [TestResultController::class, 'show']);
    Route::get('attendance', [CourseGroupStudentController::class, 'show']);
    Route::get('attendance/statuses', [AttendanceController::class, 'show']);
    Route::post('attendance/status', [AttendanceController::class, 'store']);

    Route::get('materials', [MaterialController::class, 'index']);
    Route::get('materials/{id}', [MaterialController::class, 'show']);
    Route::post('materials', [MaterialController::class, 'store']);

    //add homework api
    /**  Coach */
    Route::group([], function ($router) {
        Route::get('groups', [GroupController::class, 'index']);
        Route::get('coach-courses', [CoachController::class, 'indexCourses']);
        Route::get('coach-homeworks', [CoachHomeworkController::class, 'index'])->name('coachHomework.index');
        Route::get('coach-homeworks/{group_id}/', [CoachHomeworkController::class, 'showGroup'])->name('groupHomework.show');
        Route::get('coach-homeworks/lessons/{lesson_id}/homework', [CoachHomeworkController::class, 'showLessonWithHomework']);
        Route::get('coach-homeworks/lessons/{lesson_id}/students/{student_id}/answers', [CoachHomeworkController::class, 'showStudentAnswer']);
        Route::post('coach-homeworks/{homework_id}/students/{student_id}/feedback', [HomeworkFeedbackController::class, 'store']);
        Route::get('coach-homeworks/lessons/{lesson_id}/students/{student_id}/mark', [CoachHomeworkController::class, 'showStudentMark']);
        Route::post('coach-homeworks/lessons/{lesson_id}/students/{student_id}/mark', [HomeworkFeedbackController::class, 'storeMark']);
//        Route::get('coach-tests', [CoachTestController::class, ' '])
    });

    Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('register', [AuthController::class, 'register']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);

        Route::get('profile', [ProfileController::class, 'me']);
        Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');

        Route::group(['prefix' => 'profile'], function ($router) {
            Route::post('avatar', [ProfileController::class, 'avatar'])->name('profile.avatar');;
            Route::get('finished-courses', [CourseController::class, 'finished'])->name('courses.finished');
            Route::get('courses', [CourseController::class, 'indexOfUser'])->name('courses.indexOfUser');
            Route::get('courses/{id}', [CourseController::class, 'showOfUser'])->name('courses.showOfUser');
            Route::get('closest-lessons', [LessonController::class, 'closestLessons'])->name('lessons.closest');
        });
    });
});


//JsonApi::register('default')->routes(function ($api) {
//
//    /*
//     * page route
//     */
//    $api->resource('pages')->readOnly()->middleware('jwt.verify');
//    $api->resource('location-cities')->readOnly()->middleware('jwt.verify');
//    $api->resource('location-countries')->readOnly()->middleware('jwt.verify');
//    $api->resource('roles')->readOnly()->middleware('jwt.verify');
//    $api->resource('handbook-direction-types')->readOnly()->middleware('jwt.verify');
//
//    /*
//     * constants route - course_types, study_types, currency
//     */
//    $api->middleware('jwt.verify')->get('/constants', 'App\Http\Controllers\api\v1\ConstantController@getConstants');
//
//    /*
//     * course route
//     */
//    $api->resource('courses')
//        ->relationships(function ($relations) {
//            $relations->hasOne('handbook-direction-type');
//        })
//        ->middleware('jwt.verify');
//
//    /*
//     * course-programs route
//     */
//    $api->resource('course-programs')
//        ->relationships(function ($relations) {
//            $relations->hasOne('course');
//            $relations->hasOne('coach');
//        })
//        ->middleware('jwt.verify');
//
//    /*
//     * lessons route
//     */
////    $api->resource('lessons')
////        ->relationships(function ($relations) {
////            $relations->hasOne('course_program');
////            $relations->hasOne('prev-lesson');
////            $relations->hasOne('homework');
////        })
////        ->middleware('jwt.verify');
//
//    /*
//     * materials route
//     */
//    /*    $api->resource('materials')
//            ->relationships(function ($relations) {
//                $relations->hasOne('lesson');
//            })
//            ->middleware('jwt.verify');*/
//
//    /*
//     * Authentication routes
//     */
//    $api->resource('users')
//        ->relationships(function ($relations) {
//            $relations->hasOne('location-city');
//            $relations->hasOne('location-country');
//            $relations->hasOne('role');
//            $relations->hasMany('courses');
//        })
//        ->controller('App\Http\Controllers\api\v1\ProfileController')
//        ->routes(function ($users) {
//            $users->get('me', 'me')->name('profile.show')->middleware('jwt.verify');
//        });
//});
