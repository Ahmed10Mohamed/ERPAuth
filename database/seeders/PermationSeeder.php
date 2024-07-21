<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_permissions')->insert([

                [
                    'admin' => '1',
                    'permission' => 'admins'
                ],
                [
                    'admin' => '1',
                    'permission' => 'schools'
                ],
                [
                    'admin' => '1',
                    'permission' => 'users'
                ],[
                    'admin' => '1',
                    'permission' => 'clothes'
                ],[
                    'admin' => '1',
                    'permission' => 'logs'
                ],[
                    'admin' => '1',
                    'permission' => 'reports'
                ],[
                    'admin' => '1',
                    'permission' => 'achievements'
                ],[
                    'admin' => '1',
                    'permission' => 'games'
                ],[
                    'admin' => '1',
                    'permission' => 'games_cat'
                ],[
                    'admin' => '1',
                    'permission' => 'grades'
                ],[
                    'admin' => '1',
                    'permission' => 'translates'
                ],[
                    'admin' => '1',
                    'permission' => 'faqs'
                ],[
                    'admin' => '1',
                    'permission' => 'packages'
                ],[
                    'admin' => '1',
                    'permission' => 'categories'
                ],[
                    'admin' => '1',
                    'permission' => 'Course'
                ],[
                    'admin' => '1',
                    'permission' => 'Steek'
                ],
            ]);
            }

}
