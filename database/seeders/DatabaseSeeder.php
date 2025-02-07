<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Vehical;
use App\Models\VehicalModel;
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
        User::create([
            'role' => 'customer',
        	'first_name' => 'Ronak',
            'last_name' => 'Patel',
            'phone' => '9664725001',
        	'email' => 'user@hvsc.com',
            'password' => bcrypt('user123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'role' => 'customer',
        	'first_name' => 'Kevin',
            'last_name' => 'Rangpariya',
            'phone' => '7016587896',
        	'email' => 'user1@hvsc.com',
            'password' => bcrypt('user123'),
            'status' => 0,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        User::factory(33)->create();
        Category::create([
        	'name' => '2 Wheels',
        ]);
        Category::create([
        	'name' => '4 Wheels',
        ]);
        Brand::create([
        	'category_id' => 2,
            'name'=> 'Hundai',
        ]);
        Brand::create([
        	'category_id' => 1,
            'name'=> 'Honda',
        ]);
        VehicalModel::create([
        	'brand_id' => 1,
            'name'=> 'Creta',
        ]);
        VehicalModel::create([
        	'brand_id' => 1,
            'name'=> 'i20',
        ]);
        VehicalModel::create([
        	'brand_id' => 1,
            'name'=> 'i10',
        ]);
        VehicalModel::create([
        	'brand_id' => 2,
            'name'=> 'Activa',
        ]);
        VehicalModel::create([
        	'brand_id' => 2,
            'name'=> 'Dream Yuga',
        ]);
        Vehical::create([
            'category_id' => 2,
        	'brand_id' => 1,
            'model_id' => 3,
            'title'=> 'i10 Nios',
            'year'=> 2019,
            'fuel'=> 'Petrol',
            'color'=> 'White',
            'mileage'=> '24',
            'price'=> '5.54',
            'description'=> 'Auto+CNG, Sun Roof',
            'status'=>0,
        ]);
        Feedback::factory(18)->create();
    }
}
