<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        'price',
        'status',
        'user_id',
        'size_id'
    ];
    public function size()
    {
        return $this->belongsTo(Size::class,'size_id','id');
    }
}
