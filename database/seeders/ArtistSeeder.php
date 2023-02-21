<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Artist;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 10 artists without using factory containing name description and user_id
        Artist::create([
            'name' => 'Artist 1',
            'description' => 'Artist 1 description',
            'user_id' => 1,
        ]);
        Artist::create([
            'name' => 'Artist 2',
            'description' => 'Artist 2 description',
            'user_id' => 2,
        ]);
        Artist::create([
            'name' => 'Artist 3',
            'description' => 'Artist 3 description',
            'user_id' => 1,
        ]);
        Artist::create([
            'name' => 'Artist 4',
            'description' => 'Artist 4 description',
            'user_id' => 1,
        ]);
        Artist::create([
            'name' => 'Artist 5',
            'description' => 'Artist 5 description',
            'user_id' => 2,
        ]);
        Artist::create([
            'name' => 'Artist 6',
            'description' => 'Artist 6 description',
            'user_id' => 3,
        ]);
        Artist::create([
            'name' => 'Artist 7',
            'description' => 'Artist 7 description',
            'user_id' => 3,
        ]);
        Artist::create([
            'name' => 'Artist 8',
            'description' => 'Artist 8 description',
            'user_id' => 1,
        ]);
        Artist::create([
            'name' => 'Artist 9',
            'description' => 'Artist 9 description',
            'user_id' => 2,
        ]);
        Artist::create([
            'name' => 'Artist 10',
            'description' => 'Artist 10 description',
            'user_id' => 1,
        ]);
    }
}
