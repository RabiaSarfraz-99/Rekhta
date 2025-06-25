<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Heroslider extends Model
{
    use HasFactory; 
    protected $fillable =
    [
        'link',
        'image',
        'sequence'
    ];
}
