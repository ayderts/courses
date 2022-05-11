<?php

namespace Database\Seeders\voyagers\breads;

use App\Constants\CourseTypeConstant;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Permission;

class LessonTableSeeder extends Seeder
{
    private const TABLE_NAME = 'lessons';

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
            'display_name_singular' => 'Урок',
            'display_name_plural' => 'Уроки',
            'icon' => 'voyager-laptop',
            'model_name' => 'App\\Models\\Lesson',
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
            'field' => 'name',
            'type' => 'text',
            'display_name' => 'Название',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'lesson_description',
            'type' => 'markdown_editor',
            'display_name' => 'Описание',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'date',
            'type' => 'date',
            'display_name' => 'Дата урока',
            'required' => 1,
            'browse' => 0,
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
            'browse' => 0,
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
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'video_url',
            'type' => 'file',
            'display_name' => 'Видео',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'allowed' => ['video'],
                'allow_upload' =>'true',
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'video_web_url',
            'type' => 'text',
            'display_name' => 'Ссылка на видео',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);


        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'lesson_format',
            'type' => 'select_dropdown',
            'display_name' => 'Формат урока',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'default' => CourseTypeConstant::ONLINE,
                'options' => CourseTypeConstant::COURSE_TYPES,
            ],
        ]);

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
            'field' => 'course_group_id',
            'type' => 'number',
            'display_name' => 'Курс и группа',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'course_group_id_relationship',
            'type' => 'relationship',
            'display_name' => 'Курс и группа',
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
                'column' => 'course_group_id',
                'key' => 'id',
                'label' => 'titleWithCourse',
                'pivot_table' => 'migrations',
                'pivot' => '0',
                'taggable' => null,
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'coach_id',
            'type' => 'number',
            'display_name' => 'Тренер',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'coach_id_relationship',
            'type' => 'relationship',
            'display_name' => 'Тренер',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'model' => 'App\\Models\\Coach',
                'table' => 'coaches',
                'type' => 'belongsTo',
                'column' => 'coach_id',
                'key' => 'id',
                'label' => 'full_name',
                'pivot_table' => 'migrations',
                'pivot' => '0',
                'taggable' => null,
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'auditorium_id',
            'type' => 'number',
            'display_name' => 'Аудитория',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'auditorium_id_relationship',
            'type' => 'relationship',
            'display_name' => 'Аудитория',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'model' => 'App\\Models\\HandbookAuditorium',
                'table' => 'handbook_auditoriums',
                'type' => 'belongsTo',
                'column' => 'auditorium_id',
                'key' => 'id',
                'label' => 'full_name',
                'pivot_table' => 'migrations',
                'pivot' => '0',
                'taggable' => null,
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'position',
            'type' => 'number',
            'display_name' => 'Позиция',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 0,
            'add' => 0,
            'delete' => 1,
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
