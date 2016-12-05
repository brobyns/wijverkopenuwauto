<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'bramrobyns@hotmail.com',
            'password' => bcrypt('kikkerbil'),
            'is_admin' => 1
        ]);
    }
}
