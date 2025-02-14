<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role' => 'admin',
            'first_name' => 'Admin',
            'email' => 'admin@hvac.com',
            'password' => bcrypt('admin123'), // Secure password hashing
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        // User::factory(35)->create();
    }
}
