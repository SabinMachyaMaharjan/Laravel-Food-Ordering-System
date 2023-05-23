<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
    public function products()
    {
        return $this->hasMany(Product::class,'size_id','id');
    }
}
//1. If you create an object directly, then you cannot use protected or private properties.
//2. If you extend that class within another class then you can use protected but not private properties.
