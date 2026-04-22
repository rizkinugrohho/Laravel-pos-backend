<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory()->create([
            'name' => 'Rizki Nugroho',
            'email' => 'rizki@gmail.com',
            'phone' => '081234567890',
            'roles' => 'admin',
            'password' => bcrypt('123456789'),
        ]);

        User::factory(30)->create();
        $this->call(ProductSeeder::class);
    }
}
