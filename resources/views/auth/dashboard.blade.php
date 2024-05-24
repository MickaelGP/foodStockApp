@extends('layouts.auth')
@section('title', 'Dashboard | Food Stock')

@section('content')
    <div class="container text-center mt-5">
        <div class="row">
            <div class="col-lg-6">
                <h1>Your products in stocks by quantity</h1>
                <canvas class="mt-5" id="myChart"></canvas>
            </div>
            <div class="col-lg-6">
                <h1>Nomber of products by DLC</h1>
                <canvas class=" mt-5" id="myChartDate"></canvas>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/js/charts.js"></script>
    <script src="/js/chartsDate.js"></script>
@endpush
