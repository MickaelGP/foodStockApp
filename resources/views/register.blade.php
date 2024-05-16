@extends('layouts.guest')
@section('content')
    <section class="bg-secondary text-white">
        <div class="container">
            <div class="container w-50">
                <div class="text-center">
                    <h1>Register</h1>
                </div>
                <div>
                    <form>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" name="username" required placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="name" name="name" required placeholder="Name">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" name="password" required placeholder="Password confirmation">
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
