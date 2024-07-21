<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([

            [
                'name' => 'Admin',
                'user_name' => 'admin',
                'phone' => '01149671770',
                'email' => 'info@test.com',
                'password' => bcrypt('123456'),
                'added_by'=>1

            ]




            ]);
    }
}
