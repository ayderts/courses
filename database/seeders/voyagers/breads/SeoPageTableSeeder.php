<?php

namespace Database\Seeders\voyagers\breads;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Permission;

class SeoPageTableSeeder extends Seeder
{
    private const TABLE_NAME = 'seo_pages';

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
            'display_name_singular' => 'SEO',
            'display_name_plural' => 'SEO',
            'icon' => 'voyager-wand',
            'model_name' => 'App\\Models\\SeoPage',
            'controller' => '',
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
            'field' => 'key',
            'type' => 'text',
            'display_name' => 'Ключ',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 0,
            'add' => 0,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'title',
            'type' => 'text',
            'display_name' => 'Заголовок',
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
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'keywords',
            'type' => 'text',
            'display_name' => 'Ключевые слова',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'image_uri',
            'type' => 'image',
            'display_name' => 'Изображение',
            'required' => 1,
            'browse' => 0,
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

        Permission::firstOrCreate(['key' => 'browse_'.self::TABLE_NAME, 'table_name' => self::TABLE_NAME]);
        Permission::firstOrCreate(['key' => 'read_'.self::TABLE_NAME, 'table_name' => self::TABLE_NAME]);
        Permission::firstOrCreate(['key' => 'edit_'.self::TABLE_NAME, 'table_name' => self::TABLE_NAME]);
        Permission::firstOrCreate(['key' => 'delete_'.self::TABLE_NAME, 'table_name' => self::TABLE_NAME]);
    }
}
