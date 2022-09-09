<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPost>
 */
class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence(rand(3,8),true);
        $text =  $this->faker->realText(rand(1000,4000));
        $createdAt = $this->faker->dateTimeBetween('-3 months','-2 months');

        return [
            'category_id' => rand(1,3),
            'user_id' => rand(1,5) == 5 ? 1 : 2,
            'title' => $title,
            'slug' => Str::slug($title),
            'text' => $text,
            'published_at' => $this->faker->dateTimeBetween('-2 months','-1 days'),
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}
