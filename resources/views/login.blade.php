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
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" name="email" required placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
                        </div>
                       <x-boutton>Submit</x-boutton>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
