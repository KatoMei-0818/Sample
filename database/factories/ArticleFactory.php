<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Article;
use Faker\Generator as Faker;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */

class ArticleFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     /*
    public function definition(): array
    {
        return [
            
        ];
    }
    */

    protected $model = \App\Models\Article::class;

    public function definition(): array
    {
        
        return [
            'title' => $this -> faker->sentence(),
            'body' => $this -> faker->paragraph(),
            'published_at' => Carbon::today(),
            'user_id' => function () {
                return factory(App\Models\User::class)->create()->id;
            },
        ];
        
    }
}
