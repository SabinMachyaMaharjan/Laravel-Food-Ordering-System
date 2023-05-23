@extends('layouts.grandLayout')
@section('dashboard-content')
    <div class="container-fluid">
        <div>
            Hello {{auth()->user()->username}}!
        </div>
    </div>    
@endsection
