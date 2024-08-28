<?php

namespace Database\Seeders;

use App\Models\information;
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
            'price' => '19',
            'price_mass' => '1'
        ]);

        item::create([
            'image' => 'images/img-2.png',
            'p_name' => 'Foodism',
            'quantity' => '1000',
            'price' => '17',
            'price_mass' => '1'
        ]);

        item::create([
            'image' => 'images/img-3.png',
            'p_name' => 'Seven',
            'quantity' => '1000',
            'price' => '15',
            'price_mass' => '1'
        ]);

        item::create([
            'image' => 'images/img-4.png',
            'p_name' => 'Cyrus',
            'quantity' => '1000',
            'price' => '12',
            'price_mass' => '1'
        ]);

        User::create([
            'email' => 'likpin331@gmail.com',
            'password' => bcrypt('123'),
            'status' => 'complete',
        ]); 

        User::create([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('111'),
            'status' => 'admin'    
        ]);
        
    }   
}
