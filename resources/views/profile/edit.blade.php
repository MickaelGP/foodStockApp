@extends('layouts.auth')
@section('title', 'Profile | Food Stock')

@section('content')
    <section id="sectionProfile">
        <div class="container text-center pt-5">
            <h1>Hello {{ auth()->user()->name }}</h1>
        </div>
        <div class="container w-50 pt-5 " >
            <div class="card shadow">
                <div class="card-body">
                    <form method="POST" action="#">
                        @csrf
                        @method('PATCH')
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror"
                                       name="name" required value="{{ $user->name }}">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn bg-secondary text-white shadow rounded-5">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container w-50 pt-5">
            <div class="card shadow">
                <div class="card-body">
                    <form method="POST" action="#">
                        @csrf
                        @method('PATCH')
                        <div class="row mb-3">
                            <label for="current_password" class="col-md-4 col-form-label text-md-end">{{ __('Current Password') }}</label>

                            <div class="col-md-6">
                                <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror"
                                       name="current_password" required  autofocus>

                                @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="new_password" class="col-md-4 col-form-label text-md-end">{{ __('New password') }}</label>

                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror"
                                       name="new_password" required value="{{ old('new_password') }}">

                                @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="new_password_confirmation" class="col-md-4 col-form-label text-md-end">{{ __('New password Confirmation') }}</label>

                            <div class="col-md-6">
                                <input id="new_password_confirmation" type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror"
                                       name="new_password_confirmation" required>

                                @error('new_password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn bg-secondary text-white shadow rounded-5">
                                    {{ __('Update Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
