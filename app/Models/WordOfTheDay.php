<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordOfTheDay extends Model
{
    use HasFactory;
    protected $fillable = [
        'engword',
        'hinword',
        'urdword',
        'meaning',
        'sher',
        'poet',
        'link',
    ];
}
