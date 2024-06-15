@extends('layouts.guest')
@section('content')
    <section class="text-black" id="sectionLogin">
        <div class="container pt-5">
            <x-alert/>
            <div class="container w-50 mt-5">
                <div class="text-center mb-5">
                    <h1>Login</h1>
                </div>
                <div>
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <x-form.input type="email" id="email" name="email" placeholder="Email "/>
                        <x-form.input type="password" id="password" name="password" placeholder="Password"/>
                        <x-form.button>
                            Submit
                        </x-form.button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
