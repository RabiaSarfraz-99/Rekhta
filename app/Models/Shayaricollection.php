<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shayaricollection extends Model
{
     use HasFactory; 
    protected $fillable =
    [
        'url',
        'image',
        'title',
        'sequence'
    ];
}
