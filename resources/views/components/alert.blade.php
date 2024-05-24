@if (session('success'))
    <div class="container  alert alert-success text-center w-50 mt-5" id="alertSuccess">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="container  alert alert-warning text-center w-50 mt-5" >
        {{ session('error') }}
    </div>
@endif
@if ($errors->any())
    <div class="container  alert alert-danger text-center w-50 mt-5" id="alertDanger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
