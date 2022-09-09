<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BlogCategoriesTableSeeder::class);
        \App\Models\User::factory(5)->create();
        \App\Models\BlogPost::factory(50)->create();
    }
}
