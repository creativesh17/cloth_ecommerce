@extends('layouts.admin')

@section('title', 'Report')

@push('css')

   <link href="{{asset('contents/admin')}}/assets/plugins/ion-rangeSlider/ion.rangeSlider.css" rel="stylesheet">
   <link href="{{asset('contents/admin')}}/assets/plugins/datepicker/datepicker.min.css" rel="stylesheet" type="text/css">

@endpush

@section('content')

<!-- Start Breadcrumbbar -->                    
@component('layouts.partials.breadcumb')
    <li class="breadcrumb-item"><a href="{{ url('prodcuts') }}">Report</a></li>
    <li class="breadcrumb-item active" aria-current="page">Index</li>
@endcomponent
<!-- End Breadcrumbbar -->
<div class="contentbar">
    <div class="row">
        <div class="col-lg-8 col-xl-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-3">
                            <h5 class="card-title">Orders</h5>
                        </div>
                        <div class="col-md-9">
                            <form action="{{ url('admin/report') }}" method="GET">
                                <div class="row">
                                    <div class="col-md-4 text-left">
                                        <div class="form-group">
                                            <input type="text" id="default-date-from" name="report_from" class="datepicker-here form-control" value="{{ request('report_from') }}" placeholder="From">
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-left">
                                        <div class="form-group">
                                            <input type="text" id="default-date-to" name="report_to" class="datepicker-here form-control" value="{{ request('report_to') }}" placeholder="To">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-info btn-block">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                    <th>Status</th>                                                
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <th scope="row">#{{ $order->id }}</th>
                                    <td>{{ $order->order_total }}</td>
                                    <td>{{ $order->created_at->diffForHumans() }}</td>
                                    <td>{!! $order->status() !!}</td>
                                    <td>
                                        <div class="button-list">
                                            <a href="page-order-detail.html" class="btn btn-primary-rgba"><i class="feather icon-file"></i>
                                            </a>

                                            <a href="{{ url('admin/order/'.$order->id) }}" class="btn btn-success-rgba"><i class="feather icon-eye"></i>
                                            </a>

                                            <a href="page-order-detail.html" class="btn btn-danger-rgba"><i class="feather icon-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card m-b-30">
                <div class="card-body ecommerce-pagination">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-xl-6">
                            <p>Showing 1 to 2 of 12 entries</p>
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <nav aria-label="Page navigation example">
                                {{-- {{$orders->links()}} --}}
                            </nav>
                        </div>
                    </div>                                
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
    <script src="{{asset('contents/admin')}}/assets/plugins/ion-rangeSlider/ion.rangeSlider.min.js"></script>
    <script src="{{asset('contents/admin')}}/assets/js/custom/custom-ecommerce-shop-page.js"></script>
    <script src="{{asset('contents/admin')}}/assets/plugins/datepicker/datepicker.min.js"></script>
    <script src="{{asset('contents/admin')}}/assets/plugins/datepicker/i18n/datepicker.en.js"></script>
    <script src="{{asset('contents/admin')}}/assets/js/custom/custom-form-datepicker.js"></script>
@endpush