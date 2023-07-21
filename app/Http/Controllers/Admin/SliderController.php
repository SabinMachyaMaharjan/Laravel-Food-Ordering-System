<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SliderRequest;
use App\Services\SliderService;
use RealRashid\SweetAlert\Facades\Alert;


class SliderController extends Controller
{
    private $sliderService;
    public function __construct(SliderService $slider)
    {
        $this->sliderService=$slider;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $slider = $this->sliderService->findAll();
        return view('pages.admin.slider.index',compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\SliderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        //
        $input=$request->all();
        //dd($request->all());
        $response=$this->sliderService->addSlider($input);
        //return $response;
        //dd($response);
        Alert::toast($response['message'], $response['status']);
        return redirect('/admin/slider')->with($response['status'],$response['message']);
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
    public function edit($id)
    {
        //
        //dd($id);
        $sliders=$this->sliderService->findById($id);
        return view('pages.admin.slider.edit',compact('sliders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\SliderRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, $id)
    {
        //
        // dump($request->all());
        // dd($id);
        $response=$this->sliderService->updateSlider($request,$id);
        //return $response;
        //dd($response);
        return redirect('/admin/slider')->with($response['status'],$response['message']);
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
        //dd($id);
        //Slider::where($id);
        $response=$this->sliderService->deleteRecordById($id);
        return redirect('/admin/slider')->with($response['status'],$response['message']);
    }
}
