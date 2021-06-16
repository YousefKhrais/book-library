<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class dbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('authors')->insert([
//            'name' => Str::random(10),
//            'country' => Str::random(2),
//            'gender' => "male",
//            'books_count' => 0
//        ]);

//        DB::table('books')->insert([
//            'name' => Str::random(15),
//            'author_id' => rand(0, 10),
//            'category_id' => rand(0, 10),
//            'publisher_id' => rand(0, 10),
//            'version' => rand(0, 10),
//            'release_date' => Date::now(),
//            'image_url' => "https://google.com"
//        ]);

//        DB::table('categories')->insert([
//            'name' => Str::random(10),
//            'description' => Str::random(50)
//        ]);

//        DB::table('publishers')->insert([
//            'name' => Str::random(10),
//            'address' => Str::random(50),
//            'website' => "https://google.com",
//            'books_count' => 0
//        ]);
    }
}
