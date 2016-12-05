<?php

use Illuminate\Database\Seeder;

class FuelTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fuel_types')->insert([
            ['name' => "Benzine"],

            ['name' => "Diesel"],

            ['name' => "Elektrisch"],

            ['name' => "Hybride benzine"],

            ['name' => "Hybride diesel"],

            ['name' => "LPG"],

            ['name' => "Aardgas"],

            ['name' => "Waterstof"]
        ]);
    }
}