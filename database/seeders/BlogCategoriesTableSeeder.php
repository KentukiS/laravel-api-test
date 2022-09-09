<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => "PHP",
                'slug' => "php",
            ],
            [
                'title' => "JavaScript",
                'slug' => "javascript",
            ],
            [
                'title' => "Python",
                'slug' => "python",
            ],
        ];
        DB::Table("blog_categories")->insert($data);
    }
}
