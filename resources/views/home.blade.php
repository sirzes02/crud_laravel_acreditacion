@extends('layouts.app')

@section('styles')
    <style>
        #chartdiv,
        #chartdiv2,
        #chartdiv3,
        #chartdiv4 {
            width: 100%;
            height: 400px;
        }

    </style>
@endsection

@section('content')
    <div class="mt-4">
        <div class="row mx-2">
            <div class="col-md-6">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Data #1</div>
                    <div class="card-body">
                        <h5 class="card-title">Title #1</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Data #2</div>
                    <div class="card-body">
                        <h5 class="card-title">Title #2</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mx-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="card border-primary mb-3">
                        <div class="card-body text-primary">
                            <h5 class="card-title">Graphic #1</h5>
                            <div id="chartdiv"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-secondary mb-3">
                        <div class="card-body text-secondary">
                            <h5 class="card-title">Graphic #2</h5>
                            <div id="chartdiv2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card border-success mb-3">
                        <div class="card-body text-success">
                            <h5 class="card-title">Graphic #3</h5>
                            <div id="chartdiv3"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-danger mb-3">
                        <div class="card-body text-danger">
                            <h5 class="card-title">Graphic #4</h5>
                            <div id="chartdiv4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/frozen.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

    <script src="{{ asset('/dist/js/charts/chart1.js') }}"></script>
    <script src="{{ asset('/dist/js/charts/chart2.js') }}"></script>
    <script src="{{ asset('/dist/js/charts/chart3.js') }}"></script>
    <script src="{{ asset('/dist/js/charts/chart4.js') }}"></script>
@endsection
