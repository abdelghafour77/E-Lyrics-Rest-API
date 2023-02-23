<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lyrics extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'lyrics', 'user_id', 'song_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
