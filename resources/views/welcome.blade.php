@extends('layouts.guest')

@section('content')
    <section id="sectionPresentation" class="bg-secondary">
        <div class="container text-center">
            <div class="pt-5">
                <h1>Titre de presentation</h1>
            </div>
            <div>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto beatae cupiditate debitis
                    deserunt facere fugiat, iusto labore natus nisi obcaecati odit praesentium, quasi quisquam sunt
                    tempora veritatis voluptas voluptate.
                </p>
            </div>
            <div class="pb-3">
                <a href="#" class="btn bg-black text-white">S'inscrire</a>
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
                                   <h1>Titre description</h1>
                               </div>
                               <div>
                                   <p>
                                       laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                       in voluptate velit esse cillum dolore
                                       eu fugiat nulla pariatur.
                                       Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                   </p>
                               </div>
                               <div class="mb-2">
                                   <a href="#" class="btn bg-white text-black">Commencez</a>
                               </div>
                               <div>
                                   <a href="#" class="text-white">Vous avez déja un compte ? Connectez-vous</a>
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
                                    <h1>Titre description</h1>
                                </div>
                                <div>
                                    <p>
                                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                        in voluptate velit esse cillum dolore
                                        eu fugiat nulla pariatur.
                                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </p>
                                </div>
                                <div class="mb-2">
                                    <a href="#" class="btn bg-white text-black">Commencez</a>
                                </div>
                                <div>
                                    <a href="#" class="text-white">Vous avez déja un compte ? Connectez-vous</a>
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
    <section id="sectionContact" class="bg-secondary">
        <div class="container">
            <div class="container w-50">
                <div class="text-center">
                    <h1>Nous Contacter</h1>
                </div>
                <div>
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="name" name="name" required placeholder="Name">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" name="email" required placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <input type="number" name="phone" class="form-control" id="phone" required placeholder="Phone">
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave your message here" name="description" id="description"></textarea>
                            <label for="floatingTextarea">Description</label>
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
