@extends('layouts.app')

@section('content')
    @php
        if(auth()->check() && auth()->user()->is_vendor==1){
            $is_approved=getVendorApprovalStatus(auth()->user()->id);
            //dd($is_approved);
        }
    @endphp    
    @if(auth()->check() && auth()->user()->is_vendor==1)
        @if(isset($is_approved) && !$is_approved)
            <div class="alert alert-info">
                Your vendor approval request is being processed. Thank you for have patience.
            </div>
        @endif
    @endif
    <div>
        <!-- carousel  -->
        <div id="mainSlider" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            @if(isset($sliders)&&count($sliders)>0)
                @foreach($sliders as $key => $item)
                    <button type="button" data-bs-target="#mainSlider" data-bs-slide-to="{{$key}}" class="{{$key==0? 'active' :''}}" aria-current="{{$key==0? 'true' :false}}" aria-label="Slide {{$key+1}}"></button>
                @endforeach
            @endif        
                    <!-- <button type="button" data-bs-target="#mainSlider" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#mainSlider" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
        </div>
        <div class="carousel-inner">
            @if(isset($sliders)&&count($sliders)>0)
                @foreach($sliders as $key => $slider)
                <div class="carousel-item {{$key == 0? 'active' : ''}}">
                    <img src="{{asset('storage/slider/'.$slider->slider_image)}}" class="d-block w-100" alt="..." style="max-height:70px;">
                    <div class="carousel-caption d-none d-md-block">
                        <p>{{$slider->slider_image}}</p>
                    </div>
                </div>
                @endforeach
            @endif    
            <!-- <div class="carousel-item">
            <img src="{//{asset('image/OIPP.png')}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="{//{asset('image/OIPB.png')}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
            </div>
            </div> -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
        <!-- Banner -->
        <div class="py-2" style="overflow:hidden;">
                <img src="{{asset('image/R.png')}}" class="d-block w-100" alt="">
        </div>
    </div>
@endsection
        