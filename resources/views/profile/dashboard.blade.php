@extends('layouts.auth')
@section('title', 'Dashboard | Food Stock')

@section('content')
    <h1>Hello {{ auth()->user()->name }}</h1>
@endsection
