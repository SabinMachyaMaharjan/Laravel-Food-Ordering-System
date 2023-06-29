<?php 
namespace App\Services;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartService {
    public function handleAddToCart($product) {

        // dd($product); 
        try
            {
            $cart=Cart::firstOrCreate([ 
                'user_id' => Auth::id(),
                'has_checked'=> 0]);
            $cart ->amount+=$product ->price;
            $cart ->save();

            $cart_items=['cart_id'=>$cart->id,
            'product_id'=>$product ->id];
            CartItem::create($cart_items);
            //$count =CartItem::where('cart_id', $cart->id) -> count();
            $count =$this-> getCartCount($cart->id); 
            return ['status'=>'success',
            'message'=>'Added to cart',
            'item_count'=>$count,
            'statusCode'=>200];
        }

        catch (\Throwable $e) {
            Log::channel('product_error') -> error($e -> getMessage());
            return ['status'=>'error',
            'message'=>$e ->getMessage(),
            'item_count'=>0,
            'statusCode'=>500];
        }
    }
        public function getCartCount($cart_id)
    {
        return CartItem::where('cart_id', $cart_id)->count();
    }
    
    public function getUsersCart($user_id)
    {
             return Cart::where('user_id', $user_id)
             ->where('has_checked',0)
             ->orderby('updated_at', 'DESC')
             ->pluck('id')
             ->first();
    }
}
