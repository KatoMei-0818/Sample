<?php
 
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Article;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('users')->delete();
 
        \App\Models\User::create([
            'name' => 'root',
            'email' => 'root@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}