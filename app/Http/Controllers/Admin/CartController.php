<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\CartService;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    //
    private $productService, $cartService;
    /**
     * Summary of construct
     * @param \App\Services\ProductService $productService
     * @param \App\Services\CartService $cartService
     * @return void
     */
    public function construct(ProductService $productService,CartService $cartService){
        $this->productService = $productService;
        $this->cartService = $cartService;
    }
    public function addToCart($product_id){
    // dd($product_id);
// for success case
$response = ['status' => 'success', 'message' => 'Added to cart successfully','item_count' => 0, 'statusCode' => 200];
    // 1. product info
$product = $this->productService->findByProductId($product_id);
if (!empty($product)) {
    $response= $this->cartService->handleAddToCart($product);
    } else {
    $response = [
    'status' => 'error',
    'message' => 'Product cannot be found.',
    'item_count' => 0,
    'statusCode' => 422
    
    ];
    }
// 2. insert into cart table
// 3. insert into cart items
    return response()->json($response,$response[ 'statusCode' ]);
}
public function cartCheckout (Request $request)
    {
          // 1. has_checkout 1 
    //   dd($request->all()); 
        $inputs= $request->all(); 
    //   $res= $this->cartService->checkoutCart($inputs);
      // 2. mail to customer\
      $response = $this->cartService->checkoutCart($inputs);
      // dd($response["message"]);
      Alert::toast($response["message"],$response["status"]);
      return redirect()->back();   
    }
}
