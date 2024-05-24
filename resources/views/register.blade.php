@extends('layouts.guest')
@section('content')
    <section class=" text-black" id="sectionRegister">
        <x-alert/>
        <div class="container pt-5">
            <div class="container w-50">
                <div class="text-center mt-5">
                    <h1>Register</h1>
                </div>
                <div>
                    <form action="{{route('register')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required placeholder="Email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required placeholder="Name">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required placeholder="Password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password" name="password_confirmation" required placeholder="Password confirmation">
                            @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="text-center pb-3">
                            <button type="submit" class="btn bg-black shadow  text-white">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
