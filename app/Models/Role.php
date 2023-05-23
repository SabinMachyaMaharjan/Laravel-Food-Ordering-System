<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'role'
    ]; 
    public function users()
    {
        return $this->hasMany(User::class,'role_id');
    }
    //public function users()
    //{
    //    return $this->belongsToMany(User::class,'role_user');
    //}
}
// pivot table - primary key of shops and pk for product