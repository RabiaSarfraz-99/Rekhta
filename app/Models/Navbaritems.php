<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navbaritems extends Model
{
       use HasFactory;
    protected $fillable = [
        'navitem',
        'link',
        'sequence',
    ];
}
