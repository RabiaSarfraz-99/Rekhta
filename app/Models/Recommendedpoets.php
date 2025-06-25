<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recommendedpoets extends Model
{
     use HasFactory; 
    protected $fillable =
    [
        'url',
        'image',
        'name',
        'sequence'
    ];
}
