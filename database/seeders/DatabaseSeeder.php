<?php

namespace Database\Seeders;

use App\Models\item;
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

        item::create([
            'image' => 'images/img-1.png',
            'p_name' => 'Harshal',
            'quantity' => '1000',
            'price' => '19'
        ]);

        item::create([
            'image' => 'images/img-2.png',
            'p_name' => 'Foodism',
            'quantity' => '1000',
            'price' => '19'
        ]);

        item::create([
            'image' => 'images/img-3.png',
            'p_name' => 'Seven',
            'quantity' => '1000',
            'price' => '19'
        ]);

        item::create([
            'image' => 'images/img-4.png',
            'p_name' => 'Cyrus',
            'quantity' => '1000',
            'price' => '19'
        ]);
    }
}
