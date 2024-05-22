
    @forelse($products as $stock)
        <div class="col-lg-3 mb-2">
            <div class="container">
                <div class="card text-center bg-secondary text-white shadow">
                    <div class="card-body">
                        <h5 class="card-title">{{ $stock->product_name_fr }}</h5>
                        <div class="card-text mb-2">
                            Quantity : {{ $stock->quantite }}</br>
                            Expiration date : {{ $stock->dlc }}
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <a href="{{{ route('stock.edit', $stock) }}}" class="btn bg-black text-white">Update</a>
                            </div>
                            <div class="col-6">
                                <form class="ms-auto" action="{{ route('stock.delete', $stock) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger ">{{ __('Delete') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="container text-center alert alert-danger w-50">
                No results
            </div>
        </div>
    @endforelse

