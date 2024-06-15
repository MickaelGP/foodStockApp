@extends('layouts.auth')
@section('title', 'Stock | App food Stock')
@section('content')
    <div class="container  text-center mt-5">

        <h1>Stock Gestion <img src="/img/list.svg" id="list"  alt="Exporter une liste de course"/> </h1>

        <div class="container  mt-5">
            <div class="row mt-3">
                <div class="col">
                    <div class="input-group  mb-3">
                        <input type="text" class="form-control shadow" name="query" placeholder="search" id="searchInput">
                        <button type="button" class="btn bg-black text-white shadow " data-bs-toggle="modal"
                                data-bs-target="#addProduct">Add product
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5" id="searchResult"></div>
    <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ route('stock.store') }}" method="POST">
                        @csrf
                        <x-form.input  id="barcode" name="barcode" >
                            <label for="barcode" class="form-label">{{ __('Barcode') }}</label>
                            <div id="interactive" class="viewport d-none"></div>
                        </x-form.input>

                        <x-form.input  id="quantite" name="quantite" type="number">
                            <label for="quantite" class="form-label">{{ __('Quantity') }}</label>
                        </x-form.input>

                        <x-form.input  id="dlc" name="dlc" type="date">
                            <label for="dlc" class="form-label">{{ __('DLC') }}</label>
                        </x-form.input>

                        <div class="mb-3">
                            <select class="form-select" name="categorie_id" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="container text-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn bg-black shadow text-white">{{ __('Add product') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>
    <script src="/js/search.js"></script>
    <script src="/js/scanBareCode.js"></script>
    <script src="/js/list.js"></script>
@endpush
