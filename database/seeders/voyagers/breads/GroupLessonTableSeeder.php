<?php

namespace Database\Seeders\voyagers\breads;

use App\Constants\CourseTypeConstant;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Permission;

class GroupLessonTableSeeder extends Seeder
{
    private const TABLE_NAME = 'group_lesson';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataType = DataType::create([
            'slug' => self::TABLE_NAME,
            'name' => self::TABLE_NAME,
            'display_name_singular' => 'Группа-Урок',
            'display_name_plural' => 'Группа-Урок',
            'icon' => 'voyager-laptop',
            'model_name' => 'App\\Models\\GroupLesson',
            'controller' => '',
            'generate_permissions' => 1,
            'description' => '',
            'details' => [
                'order_column' => 'position',
                'order_display_column' => 'name',
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'id',
            'type' => 'number',
            'display_name' => 'Id',
            'required' => 1,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'date',
            'type' => 'date',
            'display_name' => 'Дата урока',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'time_from',
            'type' => 'time',
            'display_name' => 'Время начала',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'time_to',
            'type' => 'time',
            'display_name' => 'Время завершения',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

//        DataRow::create([
//            'data_type_id' => $dataType->id,
//            'field' => 'course_id',
//            'type' => 'text',
//            'display_name' => 'Курс',
//            'required' => 1,
//            'browse' => 1,
//            'read' => 1,
//            'edit' => 1,
//            'add' => 1,
//            'delete' => 1,
//        ]);

//        DataRow::create([
//            'data_type_id' => $dataType->id,
//            'field' => 'course_id_relationship',
//            'type' => 'relationship',
//            'display_name' => 'Курс',
//            'required' => 1,
//            'browse' => 1,
//            'read' => 1,
//            'edit' => 1,
//            'add' => 1,
//            'delete' => 1,
//            'details' => [
//                'model' => 'App\\Models\\Course',
//                'table' => 'courses',
//                'type' => 'belongsTo',
//                'column' => 'course_id',
//                'key' => 'id',
//                'label' => 'name',
//                'pivot_table' => 'migrations',
//                'pivot' => '0',
//                'taggable' => null,
//            ],
//        ]);

//        DataRow::create([
//            'data_type_id' => $dataType->id,
//            'field' => 'program_id_relationship',
//            'type' => 'relationship',
//            'display_name' => 'Программа',
//            'required' => 0,
//            'browse' => 1,
//            'read' => 1,
//            'edit' => 1,
//            'add' => 1,
//            'delete' => 1,
//            'details' => [
//                'model' => 'App\\Models\\Program',
//                'table' => 'programs',
//                'type' => 'belongsTo',
//                'column' => 'program_id',
//                'key' => 'id',
//                'label' => 'name',
//                'pivot_table' => 'migrations',
//                'pivot' => '0',
//                'taggable' => null,
//            ],
//        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'group_id',
            'type' => 'number',
            'display_name' => 'Группа',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'group_id_relationship',
            'type' => 'relationship',
            'display_name' => 'Группа',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'model' => 'App\\Models\\CourseGroup',
                'table' => 'course_groups',
                'type' => 'belongsTo',
                'column' => 'group_id',
                'key' => 'id',
                'label' => 'group_name',
                'pivot_table' => 'migrations',
                'pivot' => '0',
                'taggable' => null,
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'lesson_id',
            'type' => 'number',
            'display_name' => 'Урок',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'lesson_id_relationship',
            'type' => 'relationship',
            'display_name' => 'Урок',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'model' => 'App\\Models\\Lesson',
                'table' => 'lessons',
                'type' => 'belongsTo',
                'column' => 'lesson_id',
                'key' => 'id',
                'label' => 'name',
                'pivot_table' => 'migrations',
                'pivot' => '0',
                'taggable' => null,
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'created_at',
            'type' => 'timestamp',
            'display_name' => 'Дата создания',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'updated_at',
            'type' => 'timestamp',
            'display_name' => 'Дата обновления',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'deleted_at',
            'type' => 'timestamp',
            'display_name' => 'Дата удаления',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
        ]);

        Permission::generateFor(self::TABLE_NAME);
    }
}
