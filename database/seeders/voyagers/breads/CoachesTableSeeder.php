<?php

namespace Database\Seeders\voyagers\breads;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Permission;


class CoachesTableSeeder extends Seeder
{
    private const TABLE_NAME = 'coaches';

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
            'display_name_singular' => 'Тренеры',
            'display_name_plural' => 'Тренеры',
            'icon' => 'voyager-window-list',
            'model_name' => 'App\\Models\\Coach',
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
            'field' => 'user_id',
            'type' => 'number',
            'display_name' => 'Пользователь',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'user_id_relationship',
            'type' => 'relationship',
            'display_name' => 'Пользователь',
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
                'column' => 'user_id',
                'key' => 'id',
                'label' => 'name',
                'pivot_table' => 'migrations',
                'pivot' => '0',
                'taggable' => null,
            ],
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
                    'rule' => 'required|email'
                ]
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'direction_id',
            'type' => 'number',
            'display_name' => 'Направление',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'direction_id_relationship',
            'type' => 'relationship',
            'display_name' => 'Направление',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'model' => 'App\\Models\\HandbookDirectionType',
                'table' => 'handbook_direction_types',
                'type' => 'belongsTo',
                'column' => 'name',
                'key' => 'id',
                'label' => 'name',
                'pivot_table' => 'migrations',
                'pivot' => '0',
                'taggable' => null,
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'type',
            'type' => 'checkbox',
            'display_name' => 'Тип тренера',
            'required' => 0,
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
            'field' => 'salary',
            'type' => 'number',
            'display_name' => 'Гонорар',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'salary' => 'integer|size:20'
                ]
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'specialization',
            'type' => 'text',
            'display_name' => 'Специализация',
            'required' => 0,
            'browse' => 0,
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
            'field' => 'languages',
            'type' => 'text',
            'display_name' => 'Языки',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

//        DataRow::create([
//            'data_type_id' => $dataType->id,
//            'field' => 'country_name',
//            'type' => 'number',
//            'display_name' => 'Страна',
//            'required' => 0,
//            'browse' => 0,
//            'read' => 1,
//            'edit' => 1,
//            'add' => 1,
//            'delete' => 1,
//        ]);

//        DataRow::create([
//            'data_type_id' => $dataType->id,
//            'field' => 'country_name_relationship',
//            'type' => 'relationship',
//            'display_name' => 'Страна',
//            'required' => 0,
//            'browse' => 0,
//            'read' => 1,
//            'edit' => 1,
//            'add' => 1,
//            'delete' => 1,
//            'details' => [
//                'model' => 'App\\Models\\LocationCountry',
//                'table' => 'location_countries',
//                'type' => 'belongsTo',
//                'column' => 'country_name',
//                'key' => 'id',
//                'label' => 'name',
//                'pivot_table' => 'migrations',
//                'pivot' => '0',
//                'taggable' => null,
//            ],
//        ]);
//
//        DataRow::create([
//            'data_type_id' => $dataType->id,
//            'field' => 'city_name',
//            'type' => 'number',
//            'display_name' => 'Город',
//            'required' => 0,
//            'browse' => 0,
//            'read' => 1,
//            'edit' => 1,
//            'add' => 1,
//            'delete' => 1,
//        ]);
//
//        DataRow::create([
//            'data_type_id' => $dataType->id,
//            'field' => 'city_name_relationship',
//            'type' => 'relationship',
//            'display_name' => 'Город',
//            'required' => 0,
//            'browse' => 0,
//            'read' => 1,
//            'edit' => 1,
//            'add' => 1,
//            'delete' => 1,
//            'details' => [
//                'model' => 'App\\Models\\LocationCity',
//                'table' => 'location_cities',
//                'type' => 'belongsTo',
//                'column' => 'city_name',
//                'key' => 'id',
//                'label' => 'name',
//                'pivot_table' => 'migrations',
//                'pivot' => '0',
//                'taggable' => null,
//            ],
//        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'scoring',
            'type' => 'number',
            'display_name' => 'Скоринг',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'scoring' => 'integer'
                ]
            ]
        ]);


        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'iin',
            'type' => 'number',
            'display_name' => 'ИИН/БИН',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'iin' => 'integer|size:60'
                ]
            ]
        ]);

//
//        DataRow::create([
//            'data_type_id' => $dataType->id,
//            'field' => 'lesson_name',
//            'type' => 'number',
//            'display_name' => 'Преподаваемые модули',
//            'required' => 0,
//            'browse' => 0,
//            'read' => 1,
//            'edit' => 1,
//            'add' => 1,
//            'delete' => 1,
//        ]);
//
//        DataRow::create([
//            'data_type_id' => $dataType->id,
//            'field' => 'lesson_name_relationship',
//            'type' => 'relationship',
//            'display_name' => 'Преподаваемые модули',
//            'required' => 0,
//            'browse' => 0,
//            'read' => 1,
//            'edit' => 1,
//            'add' => 1,
//            'delete' => 1,
//            'details' => [
//                'model' => 'App\\Models\\Lesson',
//                'table' => 'lessons',
//                'type' => 'belongsTo',
//                'column' => 'lesson_name',
//                'key' => 'id',
//                'label' => 'name',
//                'pivot_table' => 'migrations',
//                'pivot' => '0',
//                'taggable' => null,
//            ],
//        ]);

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
            'field' => 'photo',
            'type' => 'image',
            'display_name' => 'Фотография',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'photo' => 'image|mimes:jpg,png,jpeg|size:2048'
                ],
                'tab_title' => 'Изображения и документы'
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'document',
            'type' => 'file',
            'display_name' => 'Удостоверение/Паспорт',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'document' => 'file|mimes:docx,png,pdf,jpeg,jpg'
                ]
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'resume',
            'type' => 'file',
            'display_name' => 'Резюме',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'resume' => 'file|mimes:docx,png,pdf,jpeg,jpg'
                ]
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'requisites',
            'type' => 'file',
            'display_name' => 'Реквизиты',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'requisites' => 'file|mimes:docx,png,pdf,jpeg,jpg'
                ]
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'scoring_file',
            'type' => 'file',
            'display_name' => 'Скоринг файл',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'scoring_file' => 'file|mimes:docx,png,pdf,jpeg,jpg'
                ]
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'agreement_files',
            'type' => 'file',
            'display_name' => 'Список договоров',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'agreement_files' => 'file|mimes:docx,png,pdf,jpeg,jpg'
                ]
            ]
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
