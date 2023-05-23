@extends('layouts.app')

@section('content')
<div class="">
    <img src="{{$vendor->image_cover}}" alt="{{$vendor->brand_name}}" class="w-100">
</div>
<div class="container w-100" style="background-color:whitesmoke">
    <div class="px-5 my-5">
        <div class="row mx-auto justify-content-center">
            <div class="col-md-7">
                <h3>Food Items</h3>
                <div class="list-group">
                    @if (!empty($products) && count($products)>0)
                        {{-- {{dd($products)}} --}}
                        @foreach (products as $item)
                             <div class="list-group-item list-group-item-action px-3 py-4" style="font-size:10px;">
                                <div class="row mx-auto justify-content-between">
                                    <div>
                                        {{$item->name}}
                                    </div>
                                    <div class="text-secondary d-flex justify-content-between">
                                        <strong class="text-secondary">
                                            NRP {{number_format($item->price, 2)}} |-
                                        </strong>
                                    </div>
                                    <button class="ms-3 btn btn-sm btn-info" onClick="addToCart({{$item->id}})">
                                        <i class="fa-sharp fa-solid fa-cart-shopping"></i>
                                    </button>
                                </div>    
                            </div>
                        @endforeach
                    @endif
                </div>     
            </div>
        </div>
    </div>
</div>
@endsection
@section(page-specific-js)
    <script src="{{asset('js/cart.js')}}"></script>
@endsection     
        