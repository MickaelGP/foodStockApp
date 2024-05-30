@extends('layouts.guest')

@section('content')
    <section id="sectionPresentation" class="">
        <x-alert/>
        <div class="container text-center">
            <div class="pt-5">
                <h1>About us</h1>
            </div>
            <div>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto beatae cupiditate debitis
                    deserunt facere fugiat, iusto labore natus nisi obcaecati odit praesentium, quasi quisquam sunt
                    tempora veritatis voluptas voluptate.
                </p>
            </div>
            <div class="pb-3">
                <a href="{{route('register')}}" class="btn bg-black text-white">Register</a>
            </div>
        </div>
    </section>
    <section id="sectionConcept" class="bg-black text-white">
        <div class="container ">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3">
                            <img src="/img/test.jpg" alt="" class="img-fluid rounded-5">
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2">
                            <div>
                                <div class="mt-5">
                                    <h1>The concept</h1>
                                </div>
                                <div>
                                    <p>
                                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                        reprehenderit
                                        in voluptate velit esse cillum dolore
                                        eu fugiat nulla pariatur.
                                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                        deserunt mollit anim id est laborum.
                                    </p>
                                </div>
                                <div class="mb-2">
                                    <a href="{{route('register')}}" class="btn bg-white text-black">Start</a>
                                </div>
                                <div>
                                    <a href="{{route('login')}}" class="text-white">Already have an account ? Log in</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 order-1 order-lg-1">
                            <div class="">
                                <div class="mt-5">
                                    <h1>Why use our app</h1>
                                </div>
                                <div>
                                    <p>
                                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                        reprehenderit
                                        in voluptate velit esse cillum dolore
                                        eu fugiat nulla pariatur.
                                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                        deserunt mollit anim id est laborum.
                                    </p>
                                </div>
                                <div class="mb-2">
                                    <a href="{{route('register')}}" class="btn bg-white text-black">Start</a>
                                </div>
                                <div>
                                    <a href="{{route('login')}}" class="text-white">Already have an account ? Log in</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 order-2 order-lg-2 mb-3 pt-2">
                            <img src="/img/test.jpg" alt="" class="img-fluid rounded-5">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="sectionContact" class="">
        <div class="container mb-5">
            <div class="container w-50">
                <div class="text-center pt-3">
                    <h1>Contact us</h1>
                </div>
                <div>
                    <form class="pb-5 mt-3" method="POST" action="{{route('contactMail')}}">
                        @csrf
                        <div class="mb-3">
                            @include('partials.input', [
                             'feedBack' => true,
                             'needLabel' => true,
                             'class' => 'form-control',
                             'label' => 'Nom',
                             'placeholder' => 'Doe',
                             'id' => 'name',
                             'name' => 'name',
                         ])
                        </div>
                        <div class="mb-3">
                            @include('partials.input', [
                             'feedBack' => true,
                             'needLabel' => true,
                             'class' => 'form-control',
                             'label' => 'Email',
                             'placeholder' => 'jhon@doe.fr',
                             'id' => 'email',
                             'name' => 'email',
                         ])
                        </div>
                        <div class="mb-3">
                            @include('partials.input', [
                               'feedBack' => true,
                               'needLabel' => true,
                               'type' => 'number',
                               'class' => 'form-control',
                               'label' => 'Phone',
                               'placeholder' => '06.00.00.00.00',
                               'id' => 'phone',
                               'name' => 'phone',
                           ])
                        </div>
                        <div class="form-floating mb-3">
                            @include('partials.input', [
                               'feedBack' => true,
                               'type' => 'textarea',
                               'class' => 'form-control',
                               'label' => 'Description',
                               'id' => 'description',
                               'name' => 'description',
                           ])
                        </div>

                        <div class="text-center pb-5">
                            <button type="submit" class="btn bg-black shadow  text-white">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
