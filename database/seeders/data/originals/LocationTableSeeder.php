<?php

namespace Database\Seeders\data\originals;

use App\Models\LocationCity;
use App\Models\LocationCountry;
use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locationCountry = LocationCountry::firstOrNew(['name' => 'Казахстан']);

        if (!$locationCountry->exists) {
            $locationCountry->save();
        }

        $locationCity = LocationCity::firstOrNew([
            'name' => 'Нур-Султан',
            'location_country_id' => $locationCountry->id,
        ]);

        if (!$locationCity->exists) {
            $locationCity->save();
        }
    }
}
