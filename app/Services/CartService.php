<?php 
namespace App\Services;
use App\Helpers\EmailHelper;
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
    public function checkoutCart($inputs) 
    {
        try {
    //   $update = [
    //             'has_checkedout' => 1,
    //             'shipping_address' => $inputs['shipping_address']
    //        ];
           $cart= Cart::where('id', $inputs['cart_id'])->first(); 
           $cart->has_checkedout = 1;
$cart->shipping_address= $inputs['shipping_address']; 
$cart->save();
           // send mail to customer
$data = [
    'email' => Auth::user()->email, 
    'full_name' => Auth::user()->first_name .''. Auth::user()->username,
    'cart' => $cart,
    'subject' => 'Item Checkout'                                                     
]; 
EmailHelper::sendEmail($data);
//send mail to vendors
$vendorContent = $this->formatVendorContent($cart);
$subject="New order notification";
foreach ($vendorContent as $email => $content) {
    EmailHelper::sendEmailToVendor($email, $content, $subject);
}
           return ['status' => 'success', 'message' => 'Cart has been checked out.']; 
        }catch(\Throwable $e){
            Log::error($e->getMessage());
            return ['status' => 'error' ,'message' => $e->getMessage()];
                                   }
                            }
                            private function formatVendorContent($cart) 
                            {
                                //  $userArray []; 
                                 $cart_items =$cart->cartItems;
                                 $output = [];
                                 foreach($cart_items as $item) { 
                                      $product =$item->product; 
                                      $userEmail =$product->user->email; 
                                      $output[$userEmail][] = [
                                           'name' => $product->name, 
                                           'price' => $product->price, 
                                            'qty' => $item->qty
                                      ];
                                    }
                                dd($output);
                            }    
                            public function cartitemQuantityUpdate($id, $inputs)
                            {
                                      $cartItem =CartItem::find($id);
                                 $productPrice=$cartItem->product->price;
                                 $cart=$cartItem->cart;
                               if ($inputs['btn']==='plus') { 
                                  $cartItem->quantity++;
                                     $cart->price=$cart->price-$productPrice;
                                               }
                                                elseif ($inputs ['btn']==='minus') {
                                                    
                                                    $cartItem->quantity--;
                                                    $cart->price=$cart->price-$productPrice;                        
                                                }
                                                $cartItem->save(); 
$cart->save();
                                            }
}
