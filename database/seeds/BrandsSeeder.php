<?php

use Illuminate\Database\Seeder;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            ['name' => "Abarth"],
            ['name' => "Alfa Romeo"],
            ['name' => "Aston Martin"],
            ['name' => "Audi"],
            ['name' => "Bentley"],
            ['name' => "BMW"],
            ['name' => "Chevrolet"],
            ['name' => "Citro\xC3\xABn"],
            ['name' => "Dacia"],
            ['name' => "Dodge"],
            ['name' => "DS"],
            ['name' => "Ferrari"],
            ['name' => "Fiat"],
            ['name' => "Ford"],
            ['name' => "Honda"],
            ['name' => "Hyundai"],
            ['name' => "Infiniti"],
            ['name' => "Jaguar"],
            ['name' => "Jeep"],
            ['name' => "KIA"],
            ['name' => "Lada"],
            ['name' => "Lamborghini"],
            ['name' => "Lancia"],
            ['name' => "Land Rover"],
            ['name' => "Lexus"],
            ['name' => "Lotus"],
            ['name' => "Maserati"],
            ['name' => "Mazda"],
            ['name' => "McLaren"],
            ['name' => "Mercedes-Benz"],
            ['name' => "Mia Electric"],
            ['name' => "MINI"],
            ['name' => "Mitsubishi"],
            ['name' => "Nissan"],
            ['name' => "Opel"],
            ['name' => "Peugeot"],
            ['name' => "Porsche"],
            ['name' => "Renault"],
            ['name' => "Rolls-Royce"],
            ['name' => "Saab"],
            ['name' => "Seat"],
            ['name' => "Skoda"],
            ['name' => "Smart"],
            ['name' => "Ssangyong"],
            ['name' => "Subaru"],
            ['name' => "Suzuki"],
            ['name' => "Tesla"],
            ['name' => "Toyota"],
            ['name' => "Volkswagen"],
            ['name' => "Volvo"]
        ]);
    }
}
