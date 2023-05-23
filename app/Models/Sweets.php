<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sweets extends Model
{
    //use HasFactory;
    protected $fillable=[
        'name',
        'color',
        'is_preferrable'
    ];
}
