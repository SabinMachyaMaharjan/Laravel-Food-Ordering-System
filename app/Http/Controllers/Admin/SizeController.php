<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SizeService;
use App\Http\Requests\SizeRequest;
use RealRashid\SweetAlert\Facades\Alert;


class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $sizeService;
    public function __construct(SizeService $service)
    {
        $this->sizeService=$service;
    }
    public function index()
    {
        //
        $sizes= $this->sizeService->findAll();
        return view('pages.admin.products.productSizes.index',compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.admin.products.productSizes.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\SizeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SizeRequest $request)
    {
        //
        $response=$this->sizeService->addSize($request);
        Alert::toast($response['message'], $response['status']);
        return redirect('/admin/product-size');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $size=$this->sizeService->findById($id);
        return view('pages.admin.products.productSizes.edit',compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\SizeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SizeRequest $request, $id)
    {
        //
        $response=$this->sizeService->updateSize($request,$id);
        Alert::toast($response['message'], $response['status']);
        return redirect('/admin/product-size/{product_size} ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $response=$this->sizeService->deleteRecordById($id);
        Alert::toast($response['message'], $response['status']);
        return redirect('/admin/product-size/{product_size} ');
    }
}
