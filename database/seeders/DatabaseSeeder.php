<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role' => 'admin',
        	'first_name' => 'Ritesh',
            'last_name' => 'Patel',
            'phone' => '7016590780',
        	'email' => 'admin@hvsc.com',
            'password' => bcrypt('admin123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        User::factory(35)->create();
        Category::create([
        	'name' => '2 Wheels',
        ]);
        Category::create([
        	'name' => '4 Wheels',
        ]);
    }
}
