@extends('layouts.guest')
@section('content')
    <section class=" text-black" id="sectionRegister">
        <div class="container pt-5">
            <div class="container w-50">
                <div class="text-center mt-5">
                    <h1>Register</h1>
                </div>
                <div>
                    <form action="{{route('register')}}" method="POST">
                        @csrf
                        <x-form.input type="email" id="email"  name="email">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                        </x-form.input>

                        <x-form.input  id="name"  name="name">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                        </x-form.input>

                        <x-form.input  id="password" type="password" name="password">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                        </x-form.input>

                        <x-form.input  id="password_confirmation" type="password"  name="password_confirmation">
                            <label for="password_confirmation" class="form-label">{{ __('Password confirmation') }}</label>
                        </x-form.input>

                        <x-form.button divClass="text-center pb-3" >
                            Submit
                        </x-form.button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
