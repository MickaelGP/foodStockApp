@extends('layouts.auth')
@section('title', " Update product | Food app stock")

@section('content')
    <div class="container w-50 mt-5">
        <form action="{{ route('stock.update', $stock) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="productName" class="form-label">{{ __('Product name') }}</label>
                <input type="text" class="form-control" id="productName"  name="product_name_fr" value="{{ $stock->product_name_fr }}">
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">{{ __('Quantity') }}</label>
                <input type="number" class="form-control" name="quantite" value="{{ $stock->quantite }}">
            </div>
            <div class="text-center">
                <button type="submit" class="btn bg-black text-white">{{__('Update')}}</button>
            </div>
        </form>
    </div>
@endsection
