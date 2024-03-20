@extends('layouts.admin')
@section('title', 'Admin Dashboard')

@push('css')
<link href="{{asset('contents/admin')}}/assets/plugins/apexcharts/apexcharts.css" rel="stylesheet">
@endpush
@section('content')
@component('layouts.partials.breadcumb')
    {{-- @slot('slot', '/Dashboard') --}}
    {{-- <li class="breadcrumb-item"><a href="#">Dashboard</a></li> --}}
    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
@endcomponent


<div class="contentbar">                
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12 col-xl-12">
            <!-- Start row -->
            <div class="row">
                <!-- Start col -->
                <div class="col-lg-12">
                    {!! $chart->container() !!}
                </div>
            </div>
            <!-- End row -->                        
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="{{asset('contents/admin')}}/assets/js/custom/custom-dashboard.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

    {!! $chart->script() !!}

@endpush