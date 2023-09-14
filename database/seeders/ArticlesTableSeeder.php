<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;
use App\Models\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    use HasFactory;
    public function run(): void
    {
        DB::table('articles')->delete(); // ①
        $user = \App\Models\User::first();
 
        \App\Models\Article::factory()->count(20)->create(['user_id' => $user->id,]); // ①
    }
}
