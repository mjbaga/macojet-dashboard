<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Boarder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Boarder::factory(20)->create();

        \App\Models\User::factory()->create([
            'name' => 'Marvin Baga',
            'email' => 'mjdbaga@gmail.com',
        ]);
    }
}
