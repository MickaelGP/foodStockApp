@extends('layouts.auth')
@section('title', 'Dashboard | Food Stock')

@section('content')
    <div class="container text-center mt-5">
        <h1>Hello {{ auth()->user()->name }}</h1>
    </div>

@endsection
