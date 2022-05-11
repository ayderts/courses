<?php

namespace Database\Seeders\data\fakes;

use App\Constants\LanguageConstant;
use App\Models\SeoPage;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Translation;

class SeoPageTableSeeder extends Seeder
{
    private const DATA_KEY_EXAMPLE = 'example';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data() as $keyItem => $valueItem) {
            $data = SeoPage::firstOrNew([
                'key' => $keyItem,
                'title' => $valueItem['title'],
                'description' => $valueItem['description'],
                'keywords' => $valueItem['keywords'],
                'image_uri' => 'empty',
            ]);

            $data->save();

            foreach ($valueItem as $keyTowItem => $valueTowItem) {
                Translation::firstOrNew([
                    'locale' => LanguageConstant::EN,
                    'table_name' => $data->getTable(),
                    'column_name' => $keyTowItem,
                    'foreign_key' => $data->id,
                    'value' => $valueTowItem,
                ])->save();

                Translation::firstOrNew([
                    'locale' => LanguageConstant::KZ,
                    'table_name' => $data->getTable(),
                    'column_name' => $keyTowItem,
                    'foreign_key' => $data->id,
                    'value' => $valueTowItem,
                ])->save();
            }
        }
    }

    private function data(): array
    {
        return [
            self::DATA_KEY_EXAMPLE => [
                'title' => 'Пример',
                'description' => 'Описание примера',
                'keywords' => 'example, rocketfirm, voyager',
            ],
        ];
    }
}
