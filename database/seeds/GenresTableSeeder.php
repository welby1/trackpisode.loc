<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
        	['name' => 'Action'],
        	['name' => 'Comedy'],
        	['name' => 'Drama'],
        	['name' => 'Fantasy'],
        	['name' => 'History'],
        	['name' => 'Horror'],
        	['name' => 'Mystery'],
        	['name' => 'Thriller'],
        	['name' => 'Criminal'],
        	['name' => 'Adventure']
        ]);
    }
}
