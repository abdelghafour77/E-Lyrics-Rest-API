<?php

namespace App\Models;


use App\Models\Song;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Album extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'artist_id', 'user_id'];

    // public function songs()
    // {
    //     return $this->hasMany(Song::class, 'album_id');
    // }
}
