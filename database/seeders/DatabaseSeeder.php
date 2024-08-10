<?php

namespace Database\Seeders;
use App\Models\Car; 
use App\Models\Product;
use App\Models\Class1;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Car::factory(5)->create();
        Product::factory(1)->create();
        Class1::factory(50)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
