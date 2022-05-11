<?php

namespace Database\Seeders\voyagers\breads;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Permission;

class NewsTableSeeder extends Seeder
{
    private const TABLE_NAME = 'news';

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
            'display_name_singular' => 'Новость',
            'display_name_plural' => 'Новости',
            'icon' => 'voyager-pen',
            'model_name' => 'App\\Models\\News',
            'controller' => '',
            'generate_permissions' => 1,
            'description' => '',
            'details' => [
                'order_column' => 'position',
                'order_display_column' => 'title',
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
            'type' => 'media_picker',
            'display_name' => 'Изображение',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'thumbnails' => [
                    [
                        'type' => 'resize',
                        'name' => 'medium',
                        'width' => '1200',
                    ],
                    [
                        'type' => 'resize',
                        'name' => 'small',
                        'width' => '600',
                    ],
                    [
                        'type' => 'resize',
                        'name' => 'cropped',
                        'width' => '300',
                        'height' => '300',
                    ],
                ],
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
            'field' => 'news_belongstomany_handbook_news_tag_relationship',
            'type' => 'relationship',
            'display_name' => 'Справочник: теги новостей',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 0,
            'details' => [
                'model' => 'App\\Models\\HandbookNewsTag',
                'table' => 'handbook_news_tags',
                'type' => 'belongsToMany',
                'column' => 'id',
                'key' => 'id',
                'label' => 'name',
                'pivot_table' => 'ref_news_handbook_news_tag',
                'pivot' => '1',
                'taggable' => '0',
            ],
        ]);

        Permission::generateFor(self::TABLE_NAME);
    }
}
