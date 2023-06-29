<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'card_id',
        'product_id'
    ];
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id', 'id');
    }    
}
