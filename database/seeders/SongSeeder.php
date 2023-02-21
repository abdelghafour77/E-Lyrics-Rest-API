<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Song;


class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 20 songs without using factory contain name and description and user_id and album_id
        Song::create([
            'name' => 'Song 1',
            'description' => 'Song 1 description',
            'user_id' => 1,
            'album_id' => 1,
        ]);
        Song::create([
            'name' => 'Song 2',
            'description' => 'Song 2 description',
            'user_id' => 2,
            'album_id' => 2,
        ]);
        Song::create([
            'name' => 'Song 3',
            'description' => 'Song 3 description',
            'user_id' => 1,
            'album_id' => 3,
        ]);
        Song::create([
            'name' => 'Song 4',
            'description' => 'Song 4 description',
            'user_id' => 1,
            'album_id' => 4,
        ]);
        Song::create([
            'name' => 'Song 5',
            'description' => 'Song 5 description',
            'user_id' => 2,
            'album_id' => 5,
        ]);
        Song::create([
            'name' => 'Song 6',
            'description' => 'Song 6 description',
            'user_id' => 3,
            'album_id' => 6,
        ]);
        Song::create([
            'name' => 'Song 7',
            'description' => 'Song 7 description',
            'user_id' => 3,
            'album_id' => 7,
        ]);
        Song::create([
            'name' => 'Song 8',
            'description' => 'Song 8 description',
            'user_id' => 1,
            'album_id' => 2,
        ]);
        Song::create([
            'name' => 'Song 9',
            'description' => 'Song 9 description',
            'user_id' => 1,
            'album_id' => 1,
        ]);
        Song::create([
            'name' => 'Song 10',
            'description' => 'Song 10 description',
            'user_id' => 1,
            'album_id' => 1,
        ]);
        Song::create([
            'name' => 'Song 11',
            'description' => 'Song 11 description',
            'user_id' => 1,
            'album_id' => 1,
        ]);
        Song::create([
            'name' => 'Song 12',
            'description' => 'Song 12 description',
            'user_id' => 1,
            'album_id' => 2,
        ]);
        Song::create([
            'name' => 'Song 13',
            'description' => 'Song 13 description',
            'user_id' => 1,
            'album_id' => 3,
        ]);
        Song::create([
            'name' => 'Song 14',
            'description' => 'Song 14 description',
            'user_id' => 1,
            'album_id' => 4,
        ]);
        Song::create([
            'name' => 'Song 15',
            'description' => 'Song 15 description',
            'user_id' => 1,
            'album_id' => 5,
        ]);
        Song::create([
            'name' => 'Song 16',
            'description' => 'Song 16 description',
            'user_id' => 1,
            'album_id' => 1,
        ]);
        Song::create([
            'name' => 'Song 17',
            'description' => 'Song 17 description',
            'user_id' => 1,
            'album_id' => 6,
        ]);
        Song::create([
            'name' => 'Song 18',
            'description' => 'Song 18 description',
            'user_id' => 1,
            'album_id' => 6,
        ]);
        Song::create([
            'name' => 'Song 19',
            'description' => 'Song 19 description',
            'user_id' => 1,
            'album_id' => 2,
        ]);
        Song::create([
            'name' => 'Song 20',
            'description' => 'Song 20 description',
            'user_id' => 1,
            'album_id' => 7,
        ]);

    }
}
