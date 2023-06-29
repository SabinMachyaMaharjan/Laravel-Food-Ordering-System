<?php
use App\Models\User;
use App\Services\CartService;
//This is autoload file
function getVendorApprovalStatus($id)
{
    //dd($id);
    $vendor=User::doesntHave('vendor')->where('is_vendor',1)->where('id',$id)->first();
    //dd($approvedVendor);
    if(!empty($vendor)){
        $is_approved= false;
    } else {
        $is_approved= true;
    }
    return $is_approved;
}
//1. User has data but vendor doesnot has (which is approved)
//2. $vendor = current data ($vendor is not empty) thus it has to not approved
//3. hence $is_approved is false
function getCartItemsCount()
    {
        if (auth()->check()) {
            $obj = new CartService();
            $cart_id = $obj->getUsersCart(auth()->user()->id);
            //dd($cart_id);            
            //$cart_id=auth()->user()->carts()->id;
            // $cart_items_count = (new CartService())->getCartCount($cart_id);
            $cart_items_count = $obj->getCartCount($cart_id);
        } else {
                $cart_items_count=0;
     }
      return $cart_items_count;
    }   
         