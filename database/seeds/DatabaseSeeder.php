<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(FuelTypesSeeder::class);
        $this->call(BrandsSeeder::class);
        $this->call(VehicleModelsSeeder::class);
        $this->call(PropertiesSeeder::class);
    }
}
