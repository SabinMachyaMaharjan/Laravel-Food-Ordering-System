<?php

namespace App\Http\Controllers\Client;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Services\SizeService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $sizeService;
    private $productService;
    public function __construct(SizeService $size,ProductService $productService)
    {
        $this->sizeService=$size;
        $this->productService=$productService;
    }
    public function index()
    {
        //
        $products=$this->productService->findAllProductsByUserId(Auth::user()->id);
        return view('pages.client.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sizes= $this->sizeService->findAll();
        return view('pages.client.products.create',compact('sizes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request);
        $response=$this->productService->addProduct($request);
        Alert::toast($response['message'], $response['status']);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($userid)
    {
        //
        //dd($id);
        $sizes = $this->sizeService->findAll();
        $products=$this->productService->findAllProductsByUserId($userid);
        return view('pages.client.products.edit',compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $userid)
    {
        //
        // dump($request->all());
        // dd($id);
        $response=$this->productService->updateProduct($request,$userid);
        //return $response;
        //dd($response);
        return redirect('/vendor/product/{product}')->with($response['status'],$response['message']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($userid)
    {
        //
        //dd($id);
        //product::where($id);
        $response=$this->productService->deleteRecordById($userid);
        Alert::toast($response["message"],$response["status"]);
        return redirect('/vendor/product/{product}')->with($response['status'],$response['message']);
    }
}
