<?php

namespace Database\Seeders;

use Database\Seeders\voyagers\basis\RolesTableSeeder;
use Database\Seeders\voyagers\basis\MenusTableSeeder;
use Database\Seeders\voyagers\basis\MenuItemsTableSeeder;
use Database\Seeders\voyagers\basis\SettingsTableSeeder;
use Database\Seeders\voyagers\basis\PermissionsTableSeeder;
use Database\Seeders\voyagers\basis\PermissionRoleSeeder;
use Database\Seeders\voyagers\breads\AuditoriumTableSeeder;
use Database\Seeders\voyagers\breads\ContactTableSeeder;
use Database\Seeders\voyagers\breads\CompletedCourseTableSeeder;
use Database\Seeders\voyagers\breads\CourseGroupTableSeeder;
use Database\Seeders\voyagers\breads\CourseProgramTableSeeder;
use Database\Seeders\voyagers\breads\CourseTableSeeder;
use Database\Seeders\voyagers\breads\CourseProgressTableSeeder;
use Database\Seeders\voyagers\breads\CourseCertificatesTableSeeder;
use Database\Seeders\voyagers\breads\CoachesTableSeeder;
use Database\Seeders\voyagers\breads\CourseListenersTableSeeder;
use Database\Seeders\voyagers\breads\FaqTableSeeder;
use Database\Seeders\voyagers\breads\GroupLessonTableSeeder;
use Database\Seeders\voyagers\breads\GroupStudentTableSeeder;
use Database\Seeders\voyagers\breads\HandbookAuditoriumTableSeeder;
use Database\Seeders\voyagers\breads\HandbookDirectionTypeTableSeeder;
use Database\Seeders\voyagers\breads\HandbookEmployeeLevelTableSeeder;
use Database\Seeders\voyagers\breads\HandbookEmployeeTopLevelTableSeeder;
use Database\Seeders\voyagers\breads\HandbookEmployeeTypeTableSeeder;
use Database\Seeders\voyagers\breads\HandbookLibraryAuthorTableSeeder;
use Database\Seeders\voyagers\breads\HandbookLibraryCategoryTableSeeder;
use Database\Seeders\voyagers\breads\HandbookLibraryPublisherTableSeeder;
use Database\Seeders\voyagers\breads\HandbookYearTableSeeder;
use Database\Seeders\voyagers\breads\HomeworkAnswerTableSeeder;
use Database\Seeders\voyagers\breads\HomeworkStudentMarkTableSeeder;
use Database\Seeders\voyagers\breads\HomeworkTableSeeder;
use Database\Seeders\voyagers\breads\LessonCalendarTableSeeder;
use Database\Seeders\voyagers\breads\LessonLinkTableSeeder;
use Database\Seeders\voyagers\breads\LessonStudentTableSeeder;
use Database\Seeders\voyagers\breads\LessonTableSeeder;
use Database\Seeders\voyagers\breads\LibraryTableSeeder;
use Database\Seeders\voyagers\breads\ManagerTableSeeder;
use Database\Seeders\voyagers\breads\MaterialTableSeeder;
use Database\Seeders\voyagers\breads\MenuTableSeeder;
use Database\Seeders\voyagers\breads\NewsTableSeeder;
use Database\Seeders\voyagers\breads\FeedbackTableSeeder;
use Database\Seeders\voyagers\breads\HandbookFeedbackTableSeeder;
use Database\Seeders\voyagers\breads\HandbookNewsTagTableSeeder;
use Database\Seeders\voyagers\breads\HandbookRequestSubjectTableSeeder;
use Database\Seeders\voyagers\breads\LocationCityTableSeeder;
use Database\Seeders\voyagers\breads\LocationCountryTableSeeder;
use Database\Seeders\voyagers\breads\NotificationTableSeeder;
use Database\Seeders\voyagers\breads\PageTableSeeder;
use Database\Seeders\voyagers\breads\ProgramTableSeeder;
use Database\Seeders\voyagers\breads\SeoPageTableSeeder;
use Database\Seeders\voyagers\breads\StudentTableSeeder;
use Database\Seeders\voyagers\breads\SurveyQuestionTableSeeder;
use Database\Seeders\voyagers\breads\SurveyResponseTableSeeder;
use Database\Seeders\voyagers\breads\SurveyTableSeeder;
use Database\Seeders\voyagers\breads\TestAnswerTableSeeder;
use Database\Seeders\voyagers\breads\TestQuestionTableSeeder;
use Database\Seeders\voyagers\breads\TestTableSeeder;
use Database\Seeders\voyagers\breads\UserTableSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateVoyagerSeed();
        $this->callVoyagerBreadTables();
        $this->callVoyagerBasicTables();
        $this->callDataOriginals();
        $this->callDataFakes();
    }

    /**
     * Очистка старых данных для voyager.
     */
    private function truncateVoyagerSeed()
    {
        DB::table('menu_items')->truncate();
        DB::table('settings')->truncate();
        DB::table('permissions')->truncate();
        DB::table('permission_role')->truncate();
        DB::table('menus')->truncate();
        DB::table('data_rows')->truncate();
        DB::table('data_types')->truncate();
    }

    /**
     * Вызов объектов по namespace "\Database\Seeders\voyagers\breads"
     */
    private function callVoyagerBreadTables()
    {
        $this->call(AuditoriumTableSeeder::class);
        $this->call(ContactTableSeeder::class);
        $this->call(CourseTableSeeder::class);
        $this->call(HomeworkAnswerTableSeeder::class);
        $this->call(CourseProgramTableSeeder::class);
        $this->call(CourseProgressTableSeeder::class);
        $this->call(CourseGroupTableSeeder::class);
        $this->call(CourseCertificatesTableSeeder::class);
        $this->call(CourseListenersTableSeeder::class);
        $this->call(CompletedCourseTableSeeder::class);
        $this->call(CoachesTableSeeder::class);
        $this->call(HomeworkStudentMarkTableSeeder::class);
        $this->call(FeedbackTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(FaqTableSeeder::class);
        $this->call(ManagerTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(LessonTableSeeder::class);
        $this->call(LessonLinkTableSeeder::class);
        $this->call(LessonStudentTableSeeder::class);
        $this->call(LessonCalendarTableSeeder::class);
        $this->call(LibraryTableSeeder::class);
        $this->call(LocationCountryTableSeeder::class);
        $this->call(LocationCityTableSeeder::class);
        $this->call(HomeworkTableSeeder::class);
        $this->call(HandbookAuditoriumTableSeeder::class);
        $this->call(HandbookDirectionTypeTableSeeder::class);
        $this->call(HandbookFeedbackTableSeeder::class);
        $this->call(HandbookEmployeeTypeTableSeeder::class);
        $this->call(HandbookEmployeeLevelTableSeeder::class);
        $this->call(HandbookEmployeeTopLevelTableSeeder::class);
        $this->call(HandbookLibraryAuthorTableSeeder::class);
        $this->call(HandbookLibraryCategoryTableSeeder::class);
        $this->call(HandbookLibraryPublisherTableSeeder::class);
        $this->call(HandbookRequestSubjectTableSeeder::class);
        $this->call(HandbookNewsTagTableSeeder::class);
        $this->call(HandbookYearTableSeeder::class);
        $this->call(MaterialTableSeeder::class);
        $this->call(NotificationTableSeeder::class);
        $this->call(SeoPageTableSeeder::class);
        $this->call(StudentTableSeeder::class);
        $this->call(SurveyTableSeeder::class);
        $this->call(SurveyQuestionTableSeeder::class);
        $this->call(SurveyResponseTableSeeder::class);
        $this->call(PageTableSeeder::class);
        $this->call(ProgramTableSeeder::class);
        $this->call(TestTableSeeder::class);
        $this->call(TestQuestionTableSeeder::class);
        $this->call(TestAnswerTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }

    /**
     * Вызов объектов по namespace "Database\Seeders\voyagers\basis"
     */
    private function callVoyagerBasicTables()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(MenuItemsTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(PermissionRoleSeeder::class);
        $this->call(SettingsTableSeeder::class);
    }

    /**
     * Вызов объектов по namespace "\Database\Seeders\data\fakes"
     */
    private function callDataFakes()
    {
//        $this->call(\Database\Seeders\data\fakes\CourseTableSeeder::class);
//        $this->call(\Database\Seeders\data\fakes\CourseProgramTableSeeder::class);
//        $this->call(\Database\Seeders\data\fakes\LessonTableSeeder::class);
//        $this->call(\Database\Seeders\data\fakes\TestTableSeeder::class);
//        $this->call(\Database\Seeders\data\fakes\TestQuestionTableSeeder::class);
        $this->call(\Database\Seeders\data\fakes\FeedbackTableSeeder::class);
        $this->call(\Database\Seeders\data\fakes\SeoPageTableSeeder::class);
    }

    /**
     * Вызов объектов по namespace "\Database\Seeders\data\originals"
     */
    private function callDataOriginals()
    {
        $this->call(\Database\Seeders\data\originals\HandbookDirectionTypeTableSeeder::class);
        $this->call(\Database\Seeders\data\originals\LocationTableSeeder::class);
    }
}
