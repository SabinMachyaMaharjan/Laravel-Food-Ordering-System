@extends('layouts.app', ['key' => !empty($key)? $key : ''])

@section('content')
    @php
        if(auth()->check() && auth()->user()->is_vendor==1){
            $is_approved=getVendorApprovalStatus(auth()->user()->id);
            // <!-- dd($is_approved); -->
        }
    @endphp    
    @if(auth()->check() && auth()->user()->is_vendor==1)
        @if(isset($is_approved) && !$is_approved)
        <div class="container">
            <div class="alert alert-info">
                Your vendor approval request is being processed. Thank you for have patience.
            </div>
        </div>
        @endif
    @endif
    <div class="bg-gray col-md-12">
    <div class="container-sm">
            <div class="py-5">
                <h2>Restaurants and Store</h2>
            </div>
        </div>
        <div class="row mx-auto p-5">
            @if (!empty($vendors) && count($vendors)>0)
                @foreach ($vendors as $vendor)
                    <div class="col-md-4">
                        <a href="{{route('restaurant.detail', $vendor->id)}}">
                            <div class="card restaurant-card">
                                <div>
                                    <img src="{{$vendor->image_cover}}" alt="{{$vendor->brand_name}}" class="w-100">
                                </div>
                                <div class="card-body">
                                    <h4>
                                        {{$vendor->brand_name}}
                                    </h4>
                                    <div>
                                        Location:
                                        <br>
                                        Service: {{$vendor->service}}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>  
                @endforeach
            @endif
        </div>
    </div>    
@endsection
        