@extends('website.layouts.app')
@section('content')

<div>
    {{-- Be like water. --}}
    <div class="account-area section-space">
        <div class="container">
            <div class="myaccount-page-wrapper">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        @include('website.pages.profile.sidemenu')
                    </div>

                    <div class="col-lg-9 col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h3>Orders</h3>
                                <div class="table-responsive">
                                    <table class="myaccount-table table-responsive text-center table table-bordered">

                                        <thead class="thead-light">
                                            @if (count($orders) > 0)
                                                <tr>
                                                    <th>Order</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                    <th>Action</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>{{ $item->order_status }}</td>
                                                    <td>{{ $item->total_price }}</td>
                                                    <td><a class="btn btn-sm btn-outline-warning" href="{{ route('download_invoice', $item->invoice_id) }}" class="check-btn sqr-btn">Download</a></td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <b>No order found!</b>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
