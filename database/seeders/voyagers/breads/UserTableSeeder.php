<?php

namespace Database\Seeders\voyagers\breads;

use App\Constants\CoachStatusConstant;
use App\Constants\GenderConstant;
use App\Constants\LanguageConstant;
use App\Constants\StudyTypeConstant;
use App\Http\Controllers\Voyager\VoyagerUserController;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Permission;

class UserTableSeeder extends Seeder
{
    private const TABLE_NAME = 'users';

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
            'display_name_singular' => 'Профиль',
            'display_name_plural' => 'Профили',
            'icon' => 'voyager-people',
            'model_name' => 'App\\Models\\User',
            'controller' => VoyagerUserController::class,
            'generate_permissions' => 1,
            'description' => '',
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
            'display_name' => 'Логин',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
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
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'password',
            'type' => 'text',
            'display_name' => 'Пароль',
            'required' => 1,
            'browse' => 0,
            'read' => 0,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'role_id',
            'type' => 'number',
            'display_name' => 'Роль',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'user_belongsto_role_relationship',
            'type' => 'relationship',
            'display_name' => 'Роль',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'model' => 'TCG\\Voyager\\Models\\Role',
                'table' => 'roles',
                'type' => 'belongsTo',
                'column' => 'role_id',
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
            'browse' => 1,
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

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'avatar',
            'type' => 'image',
            'display_name' => 'Изображение',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'resize' => [
                    'width' => '1200',
                    'height' => 'null',
                ],
                'quality' => '70%',
                'upsize' => true,
                'thumbnails' => [
                    [
                        'name' => 'medium',
                        'scale' => '50%',
                    ],
                    [
                        'name' => 'small',
                        'scale' => '25%',
                    ],
                    [
                        'name' => 'cropped',
                        'crop' => [
                            'width' => '300',
                            'height' => '300',
                        ],
                    ],
                ],
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'last_name',
            'type' => 'text',
            'display_name' => 'Фамилия',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'rule' => 'regex:/^[\pL\s\-]*$/u',
                    'messages' => [
                        'regex' => 'Фамилия может содержать только символы алфавита',
                    ],
                ],
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'first_name',
            'type' => 'text',
            'display_name' => 'Имя',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'rule' => 'regex:/^[\pL\s\-]*$/u',
                    'messages' => [
                        'regex' => 'Имя может содержать только символы алфавита',
                    ],
                ],
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'fathers_name',
            'type' => 'text',
            'display_name' => 'Отчество',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'rule' => 'regex:/^[\pL\s\-]*$/u',
                    'messages' => [
                        'regex' => 'Отчество может содержать только символы алфавита',
                    ],
                ],
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'occupation',
            'type' => 'text',
            'display_name' => 'Должность',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'rule' => 'regex:/^[\pL\s\-]*$/u',
                    'messages' => [
                        'regex' => 'Должность может содержать только символы алфавита',
                    ],
                ],
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'location_city_id',
            'type' => 'number',
            'display_name' => 'Место проживания: город',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'location_city_id_relationship',
            'type' => 'relationship',
            'display_name' => 'Место проживания: город',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'model' => 'App\\Models\\LocationCity',
                'table' => 'location_cities',
                'type' => 'belongsTo',
                'column' => 'location_city_id',
                'key' => 'id',
                'label' => 'name',
                'pivot_table' => 'migrations',
                'pivot' => '0',
                'taggable' => null,
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'location_country_id',
            'type' => 'number',
            'display_name' => 'Гражданство: страна',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'location_country_id_relationship',
            'type' => 'relationship',
            'display_name' => 'Гражданство: страна',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'model' => 'App\\Models\\LocationCountry',
                'table' => 'location_country',
                'type' => 'belongsTo',
                'column' => 'location_country_id',
                'key' => 'id',
                'label' => 'name',
                'pivot_table' => 'migrations',
                'pivot' => '0',
                'taggable' => null,
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'phone',
            'type' => 'text',
            'display_name' => 'Телефон',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'second_phone',
            'type' => 'text',
            'display_name' => 'Второй Телефон',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'birth_date',
            'type' => 'date',
            'display_name' => 'Дата рождения',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'gender',
            'type' => 'select_dropdown',
            'display_name' => 'Пол',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'default' => GenderConstant::MALE,
                'options' => GenderConstant::GENDER,
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'is_active_notification',
            'type' => 'checkbox',
            'display_name' => 'Присылать Уведомления',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'on' => 'Да',
                'off' => 'Нет',
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'company_name',
            'type' => 'text',
            'display_name' => 'Название компании',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'holding_name',
            'type' => 'text',
            'display_name' => 'Компания сотрудника',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'languages',
            'type' => 'select_multiple',
            'display_name' => 'Языки',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'default' => LanguageConstant::RU,
                'options' => LanguageConstant::LANGUAGES,
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'iin',
            'type' => 'text',
            'display_name' => 'ИИН',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'id_card_file',
            'type' => 'file',
            'display_name' => 'Файл Уд. личности/Паспорта',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'resume_file',
            'type' => 'file',
            'display_name' => 'Файл резюме',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'requisites_file',
            'type' => 'file',
            'display_name' => 'Файл реквизита',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'agreement_files',
            'type' => 'file',
            'display_name' => 'Файлы договоров',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'coach_type',
            'type' => 'select_dropdown',
            'display_name' => 'Тип тренера',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'default' => StudyTypeConstant::INNER,
                'options' => StudyTypeConstant::STUDY_TYPES,
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'coach_status',
            'type' => 'select_dropdown',
            'display_name' => 'Статус тренера',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'default' => CoachStatusConstant::COOPERATED,
                'options' => CoachStatusConstant::COACH_STATUSES,
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'coach_fee',
            'type' => 'text',
            'display_name' => 'Гонорар тренера',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'scoring_file',
            'type' => 'file',
            'display_name' => 'Файл оценивания',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'scoring',
            'type' => 'text',
            'display_name' => 'Оценивание',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'rups',
            'type' => 'text',
            'display_name' => 'Рупы',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'email_private',
            'type' => 'text',
            'display_name' => 'Email личный',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
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
            'field' => 'personal_type',
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
            'field' => 'person_id',
            'type' => 'number',
            'display_name' => 'Идентификатор Физ. лица',
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
            'type' => 'number',
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
            'field' => 'position_level',
            'type' => 'text',
            'display_name' => 'Уровень',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'position_level_top',
            'type' => 'text',
            'display_name' => 'Топ уровень',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'position_family',
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
            'field' => 'grade',
            'type' => 'number',
            'display_name' => 'Грейд',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        Permission::generateFor(self::TABLE_NAME);
    }
}
