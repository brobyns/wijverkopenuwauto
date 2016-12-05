<?php

use Illuminate\Database\Seeder;

class PropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicle_properties')->insert([
            ['name' => '4x4'],
            ['name' => 'ABS'],
            ['name' => 'Adaptive lights'],
            ['name' => 'Boordcomputer'],
            ['name' => 'Cruise Control'],
            ['name' => 'Centrale vergrendeling'],
            ['name' => 'Dagrijlichten'],
            ['name' => 'Elektrische ruiten'],
            ['name' => 'Electronic Stability Program'],
            ['name' => 'Lichtmetalen velgen'],
            ['name' => 'Mistlampen'],
            ['name' => 'Multifunctioneel stuur'],
            ['name' => 'Open dak'],
            ['name' => 'Panoramisch dak'],
            ['name' => 'Parkeersensoren'],
            ['name' => 'Radio'],
            ['name' => 'Skiluik'],
            ['name' => 'Sportophanging'],
            ['name' => 'Sportpakket'],
            ['name' => 'Sportzetels'],
            ['name' => 'Standverwarming'],
            ['name' => 'Start/Stop systeem'],
            ['name' => 'Stuurbekrachtiging'],
            ['name' => 'Trekhaak'],
            ['name' => 'Xenon Lichten'],
            ['name' => 'Zetelverwarming']

            ]);
    }
}
