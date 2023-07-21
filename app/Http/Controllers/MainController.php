<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Size;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Vendor;
use App\Models\CartItem;
use App\services\UserDetailService;
use App\Jobs\SendEmailJob;
use App\Jobs\WriteFileJob;
use Illuminate\Http\Request;
use App\Services\SliderService;
use App\Services\VendorService;
use App\Services\ProductService;
use App\Services\CartService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    //
    private $sliderService;
    private $vendorService;
    private $productService;
    private $cartService;
    private $userDetail;
    public function __construct(SliderService $slider,VendorService $vendor,ProductService $product,CartService $cart,UserDetailService $userDetail)
    {
        $this->sliderService=$slider;
        $this->vendorService=$vendor;
        $this->productService=$product;
        $this->cartService=$cart;
        $this->userDetail = $userDetail;
    }
    public function main()
    {
        $sliders=$this->sliderService->findAll();
        return view('main',compact('sliders'));
    }
    public function about(){
        
        return view('about');
    }
    public function showRestaurants()
    {
        $conditions=[
            'is_active'=>1
        ];
        $vendors=$this->vendorService->findAll(null,null,$conditions);
        //dd($vendors);
        return view('pages.restaurants',compact('vendors'));
    }
    public function ShowRestaurantsDetail($vendorid)
    {
        $userDetail = DB::table("user_details")->where("user_id",2)->get();
        $vendor = $this->vendorService->findOneById($vendorid);
        $productsRes = $this->productService->findProductByUserId($vendor->user_id);
        // if ($productsRes['status'=='success']) {
        //     # code...
        // }
        $products = $productsRes['products'];
        //dd($products);
        $sizes = Size::has("products")->where("id",$id)->get();
        return view('pages.restaurantsDetail',compact('vendor','products','userDetail','sizes'));
    }
    public function dispatchJob()
    {
        // WriteFileJob::dispatch();
        SendEmailJob::dispatch();
        dd('Mail queued') ;
    }
    public function getActiveCartItems()
    {
        if(auth()->check()){
            $cart=$this->cartService->getUsersCart(auth()->user()->id);
            $cartItems =$this->cartService->getCartItem($cart);
            return view('pages.cartList', compact( 'cartItems'));
        }
    }
    public function deleteCartItem($id)
    {
        CartItem::where('id',$id)->delete(); 
        return back();
    }

    public function searchRestaurant(Request $request)
    {
        $inputs = $request->all();
        $vendors = $this->vendorService->searchVendor($inputs);
        $key = $inputs['search'];
        return view('pages.restaurants',compact('vendors','key'));

    }
}
