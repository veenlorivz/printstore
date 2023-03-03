@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-2">
            @include('components.sidebar')
        </div>
        <div class="col-10 content-dashboard pe-5">
            @yield("content-dashboard")
        </div>

@endsection
