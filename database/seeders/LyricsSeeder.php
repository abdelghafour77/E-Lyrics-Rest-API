<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lyrics;

class LyricsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 10 lyrics without using factory containing title content and song_id adn user_id
        Lyrics::create([
            'title' => 'Lyrics 1',
            'content' => 'Lyrics 1 content',
            'song_id' => 1,
            'user_id' => 1,
        ]);
        Lyrics::create([
            'title' => 'Lyrics 2',
            'content' => 'Lyrics 2 content',
            'song_id' => 2,
            'user_id' => 2,
        ]);
        Lyrics::create([
            'title' => 'Lyrics 3',
            'content' => 'Lyrics 3 content',
            'song_id' => 3,
            'user_id' => 1,
        ]);
        Lyrics::create([
            'title' => 'Lyrics 4',
            'content' => 'Lyrics 4 content',
            'song_id' => 4,
            'user_id' => 1,
        ]);
        Lyrics::create([
            'title' => 'Lyrics 5',
            'content' => 'Lyrics 5 content',
            'song_id' => 5,
            'user_id' => 2,
        ]);
        Lyrics::create([
            'title' => 'Lyrics 6',
            'content' => 'Lyrics 6 content',
            'song_id' => 6,
            'user_id' => 3,
        ]);
        Lyrics::create([
            'title' => 'Lyrics 7',
            'content' => 'Lyrics 7 content',
            'song_id' => 7,
            'user_id' => 3,
        ]);
    }
}
