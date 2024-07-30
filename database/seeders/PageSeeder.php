<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([

                [
                    'page_name' => 'products',
                    'model_name'=> 'Product',
                    'created_at'=>now(),
                    'updated_at'=>now(),

                ],
                [
                    'page_name' => 'users',
                    'model_name'=> 'User',
                    'created_at'=>now(),
                    'updated_at'=>now(),

                ],
                [
                    'page_name' => 'emp',
                    'model_name'=> 'Employee',
                    'created_at'=>now(),
                    'updated_at'=>now(),

                ],
            ]);

        }

}
