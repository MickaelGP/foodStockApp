@extends('layouts.auth')
@section('title', " Update product | Food app stock")

@section('content')
    <div class="container w-50 mt-5">
        <form action="{{ route('stock.update', $stock) }}" method="POST">
            @csrf
            @method('PATCH')
            <x-form.input type="text"  id="productName"  name="product_name_fr" value="{{ $stock->product_name_fr }}" >
                <label for="productName" class="form-label">{{ __('Product name') }}</label>
            </x-form.input>
            <x-form.input type="number"  name="quantite" value="{{ $stock->quantite }}">
                <label for="quantity" class="form-label">{{ __('Quantity') }}</label>
            </x-form.input>
            <x-form.button>
                {{__('Update')}}
            </x-form.button>
        </form>
    </div>
@endsection
