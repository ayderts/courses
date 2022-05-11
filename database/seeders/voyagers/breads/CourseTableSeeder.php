<?php

namespace Database\Seeders\voyagers\breads;

use App\Constants\CourseTypeConstant;
use App\Constants\CurrencyConstant;
use App\Constants\StudyTypeConstant;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Permission;

class CourseTableSeeder extends Seeder
{
    private const TABLE_NAME = 'courses';

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
            'display_name_singular' => 'Курс',
            'display_name_plural' => 'Курсы',
            'icon' => 'voyager-study',
            'model_name' => 'App\\Models\\Course',
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
            'display_name' => 'ID',
            'required' => 1,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'erp_id',
            'type' => 'number',
            'display_name' => 'ERP id',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
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
            'field' => 'description',
            'type' => 'text_area',
            'display_name' => 'Описание',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'price',
            'type' => 'number',
            'display_name' => 'Стоимость',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'min' => 0
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'date_from',
            'type' => 'date',
            'display_name' => 'Дата начала',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'date_to',
            'type' => 'date',
            'display_name' => 'Дата завершения',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'duration',
            'type' => 'number',
            'display_name' => 'Длительность (Кол. часов)',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 0,
            'add' => 0,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'image_url',
            'type' => 'image',
            'display_name' => 'Изображение',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'resize' => [
                    'width' => '1000',
                    'height' => 'null',
                ],
                'quality' => '70%',
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'course_type',
            'type' => 'select_dropdown',
            'display_name' => 'Тип курса(формат)',
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

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'study_type',
            'type' => 'select_dropdown',
            'display_name' => 'Тип обучения(тип оплаты)',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'default' => StudyTypeConstant::INNER,
                'options' => StudyTypeConstant::STUDY_TYPES,
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'currency',
            'type' => 'select_dropdown',
            'display_name' => 'Валюта',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'default' => CurrencyConstant::KZT,
                'options' => CurrencyConstant::CURRENCY,
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'has_certificate',
            'type' => 'checkbox',
            'display_name' => 'Наличие сертификата',
            'required' => 1,
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
            'field' => 'homework_number',
            'type' => 'number',
            'display_name' => 'Кол. домашних заданий',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'min' => 0,
                'default' => 0,
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'test_number',
            'type' => 'number',
            'display_name' => 'Кол. тестов',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'min' => 0,
                'default' => 0,
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'handbook_direction_type_id',
            'type' => 'number',
            'display_name' => 'Справочник: Тип направления',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'handbook_direction_type_id_relationship',
            'type' => 'relationship',
            'display_name' => 'Справочник: Тип направления',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'model' => 'App\\Models\\HandbookDirectionType',
                'table' => 'handbook_direction_types',
                'type' => 'belongsTo',
                'column' => 'handbook_direction_type_id',
                'key' => 'id',
                'label' => 'name',
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
