<?php

namespace Database\Seeders\voyagers\breads;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Permission;


class CourseListenersTableSeeder extends Seeder
{
    private const TABLE_NAME = 'course_listeners';

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
            'display_name_singular' => 'Слушатели',
            'display_name_plural' => 'Слушатели',
            'icon' => 'voyager-window-list',
            'model_name' => 'App\\Models\\CourseListeners',
            'controller' => '',
            'generate_permissions' => 1,
            'description' => '',
            'details' => [
                'order_column' => 'position',
                'order_direction' => 'ASC'
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'id',
            'type' => 'number',
            'display_name' => 'ID',
            'required' => 1,
            'browse' => 1,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'full_name',
            'type' => 'text',
            'display_name' => 'ФИО',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'rule' => 'max:60',
                    'messages' => [
                        'max' => 'ФИО не должно превышать 60 символов'
                    ]
                ]
            ]

        ]);        

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'job_position',
            'type' => 'text',
            'display_name' => 'Должность',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'rule' => 'max:60',
                    'messages' => [
                        'max' => 'Должность не должна превышать 60 символов'
                    ]
                ]
            ]
        ]);        

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'role',
            'type' => 'text',
            'display_name' => 'Роль',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'rule' => 'max:60',
                    'messages' => [
                        'max' => 'Роль не должна превышать 60 символов'
                    ]
                ]
            ]
        ]); 

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'personal_phone_number',
            'type' => 'text',
            'display_name' => 'Личный номер телефона',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'default' => '+7',
                'validation' => [
                    'rule' => 'max:12',
                    'messages' => [
                        'max' => 'Кол-во цифр в личном телефоне не должно превышать 12 символов'
                    ]
                ]
            ]
        ]); 

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'job_phone_number',
            'type' => 'text',
            'display_name' => 'Рабочий номер телефона',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'default' => '+7',
                'validation' => [
                    'rule' => 'max:12',
                    'messages' => [
                        'max' => 'Кол-во цифр в рабочем телефоне не должно превышать 12 символов'
                    ]
                ]
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'email',
            'type' => 'text',
            'display_name' => 'Email',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'rule' => 'unique:course_listeners,email',
                    'messages' => [
                        'unique' => 'Слушатель с данным адресом электронной почты уже существует'
                    ]
                ]
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'type',
            'type' => 'checkbox',
            'display_name' => 'Статус (внутренний/внешний)',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'on' => 'Внутренний',
                'off' => 'Внешний',
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'course_groups_id',
            'type' => 'number',
            'display_name' => 'Группа',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'course_groups_id_relationship',
            'type' => 'relationship',
            'display_name' => 'Группа',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'model' => 'App\\Models\\CourseGroups',
                'table' => 'course_groups',
                'type' => 'belongsTo',
                'column' => 'course_groups_id',
                'key' => 'id',
                'label' => 'group_name',
                'pivot_table' => 'migrations',
                'pivot' => '0',
                'taggable' => null,
            ]
        ]);


        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'course_id',
            'type' => 'number',
            'display_name' => 'Курс',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'course_id_relationship',
            'type' => 'relationship',
            'display_name' => 'Курс',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'model' => 'App\\Models\\Course',
                'table' => 'courses',
                'type' => 'belongsTo',
                'column' => 'course_id',
                'key' => 'id',
                'label' => 'name',
                'pivot_table' => 'migrations',
                'pivot' => '0',
                'taggable' => null,
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'company',
            'type' => 'text',
            'display_name' => 'Компания',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'tab_title' => 'Данные о сотруднике'
            ]
        ]);
        
        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'division',
            'type' => 'text',
            'display_name' => 'Дивизион',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'project',
            'type' => 'text',
            'display_name' => 'Проект',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'employee_type',
            'type' => 'text',
            'display_name' => 'Тип сотрудника',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'erp_identifier',
            'type' => 'text',
            'display_name' => 'Идентификатор физлица с ERP',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'employee_number',
            'type' => 'text',
            'display_name' => 'Номер сотрудника',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'employee_code',
            'type' => 'text',
            'display_name' => 'Код сотрудника',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'employee_level',
            'type' => 'text',
            'display_name' => 'Уровень сотрудника',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'job_position_level_top',
            'type' => 'text',
            'display_name' => 'ТОП должностей',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'job_position_family',
            'type' => 'text',
            'display_name' => 'Семейство должности',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'employee_grading',
            'type' => 'number',
            'display_name' => 'Грейд сотрудника',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
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
