<?php

namespace Database\Seeders\voyagers\breads;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Permission;

class LessonStudentTableSeeder extends Seeder
{
    private const TABLE_NAME = 'lesson_students';

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
            'display_name_singular' => 'Урок и слушатель',
            'display_name_plural' => 'Уроки и слушатели',
            'icon' => 'voyager-people',
            'model_name' => 'App\\Models\\LessonStudent',
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
            'field' => 'lesson_id',
            'type' => 'number',
            'display_name' => 'Урок',
            'required' => 1,
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
            'required' => 1,
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
            'field' => 'student_id',
            'type' => 'number',
            'display_name' => 'Слушатель',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'student_id_relationship',
            'type' => 'relationship',
            'display_name' => 'Слушатель',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'model' => 'App\\Models\\User',
                'table' => 'users',
                'type' => 'belongsTo',
                'column' => 'student_id',
                'key' => 'id',
                'label' => 'name',
                'pivot_table' => 'migrations',
                'pivot' => '0',
                'taggable' => null,
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'lesson_link_id',
            'type' => 'number',
            'display_name' => 'Ссылка на урок',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'lesson_link_id_relationship',
            'type' => 'relationship',
            'display_name' => 'Ссылка на урок',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'model' => 'App\\Models\\LessonLink',
                'table' => 'lesson_links',
                'type' => 'belongsTo',
                'column' => 'lesson_link_id',
                'key' => 'id',
                'label' => 'name',
                'pivot_table' => 'migrations',
                'pivot' => '0',
                'taggable' => null,
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'attendance',
            'type' => 'number',
            'display_name' => 'Посещаемость',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'default' => 0,
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'homework_score',
            'type' => 'number',
            'display_name' => 'Оценка дом. работы',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'default' => 0,
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'test_score',
            'type' => 'number',
            'display_name' => 'Оценка теста',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'default' => 0,
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'performance',
            'type' => 'number',
            'display_name' => 'Успеваемость',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'default' => 0,
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'test_attempts',
            'type' => 'number',
            'display_name' => 'Кол. попыток теста',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'default' => 0,
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'test_answers',
            'type' => 'text',
            'display_name' => 'Ответы теста',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 0,
            'add' => 0,
            'delete' => 1,
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
