<?php

namespace Database\Seeders\voyagers\breads;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Permission;

class PageTableSeeder extends Seeder
{
    private const TABLE_NAME = 'pages';

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
            'display_name_singular' => 'Текстовая страница',
            'display_name_plural' => 'Текстовые страницы',
            'icon' => 'voyager-file-text',
            'model_name' => 'App\\Models\\Page',
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
            'field' => 'content',
            'type' => 'rich_text_box',
            'display_name' => 'Содержание',
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
            'field' => 'files',
            'type' => 'media_picker',
            'display_name' => 'Файлы',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 0,
            'details' => [
                'min' => 0,
                'max' => 10,
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'seo_title',
            'type' => 'text',
            'display_name' => 'SEO: заголовок',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'seo_description',
            'type' => 'text',
            'display_name' => 'SEO: описание',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'seo_image',
            'type' => 'image',
            'display_name' => 'SEO: изображение',
            'required' => 0,
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
            'field' => 'seo_slug',
            'type' => 'text',
            'display_name' => 'SEO ссылка',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 0,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'slugify' => [
                    'origin' => 'title',
                    'forceUpdate' => true
                ]
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

        Permission::generateFor(self::TABLE_NAME);
    }
}
