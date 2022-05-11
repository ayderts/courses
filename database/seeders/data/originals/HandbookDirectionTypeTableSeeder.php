<?php

namespace Database\Seeders\data\originals;

use App\Models\HandbookDirectionType;
use Illuminate\Database\Seeder;

class HandbookDirectionTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locationCountry = HandbookDirectionType::firstOrNew(['name' => 'hr']);

        if (!$locationCountry->exists) {
            $locationCountry->save();
        }

        $locationCountry = HandbookDirectionType::firstOrNew(['name' => 'Менеджмент']);

        if (!$locationCountry->exists) {
            $locationCountry->save();
        }

        $locationCountry = HandbookDirectionType::firstOrNew(['name' => 'Инженерия']);

        if (!$locationCountry->exists) {
            $locationCountry->save();
        }
    }
}
