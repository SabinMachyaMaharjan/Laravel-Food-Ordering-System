@extends('layouts.grandLayout')

@section('dashboard-content')
<div class="container-fluid">
    <div class="form-group">
                        <label for="slider-text-id">Slider text</label>
                        <input type="text" class="form-control" id="slider-text-id" name="slider_text" placeholder="Enter name" value="{{isset($slider)? $slider->slider_text : ''}}">
    </div>
                    <div class="form-group">
                        <label for="slider-image">File input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="slider-image" name="slider_image">
                                <label class="custom-file-label" for="slider-image">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>    
                    <div>
                        @if(isset($sliders))
                        <div>    
                            <label for="">Current Slider</label>
                            <br>
                            <img src="{{asset('storage/slider/'.$sliders->slider_image)}}" alt="{{$sliders->slider_image}}" width="150px">
                        </div>
                        @endif
                    </div>             
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>            
</div>    
@endsection