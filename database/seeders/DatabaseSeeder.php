<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            BoarderSeeder::class,
            UnitSeeder::class
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Marvin Baga',
            'email' => 'mjdbaga@gmail.com',
        ]);
    }
}
