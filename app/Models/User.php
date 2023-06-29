<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
// use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'role_id',
        'is_vendor'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class,'role_id','id');
    }
    //public function roles()
    //{
    //    return $this->belongsToMany(User::class,'role_user');
    //}
    public function vendor()
    {
        return $this->hasOne(Vendor::class,'user_id');
    }
    // public function checkForVendorApproval()
    // {
    //     if($this->role_id==3 && $this->is_vendor==1){
    //         dd($this->vendor);
    //     }
    // }
    public function carts()
    {
        return $this->hasMany(Cart::class, 'user_id');
    }
}

//pivot table stays between two tables having many to many relationships
// public function getCartItemCount(){

// }
// public function getCartCount($cart_id)
// {
//     return CartItem::where('card_id',$card_id)->count();
// }
// public function getUsersCart($user_id)
// {
//     return Cart::where('user_id',$user_id)
//         ->where('has');
// }    