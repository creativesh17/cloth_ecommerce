@extends('website.layouts.app',[
    'meta' => [
        "title" => "Orders",
    ],
])



@section('content')

<div>
    {{-- Be like water. --}}
    <div class="account-area section-space">
        <div class="container ">
            <div class="myaccount-page-wrapper ">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        @include('website.pages.sidemenu')
                    </div>

                    <div class="col-lg-9 col-sm-12 col-md-6 mt-3 table-responsive-sm">
                        <table class="table table-borderd">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"><strong>Status</strong></th>
                                    <th scope="col"><strong>Sub Total</strong></th>
                                    <th scope="col"><strong>Total Price</strong></th>
                                    <th scope="col"><strong>Created At</strong></th>
                                    <th scope="col"><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($orders && count($orders))
                                @foreach($orders as $key=>$order)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td><strong>{{ $order->order_status }}</strong></td>
                                    <td><strong>{{ $order->sub_total }}</strong></td>
                                    <td><strong>{{ $order->total_price }}</strong></td>
                                    <td><strong>{{ $order->created_at->diffForHumans() }}</strong></td>
                                    <td>
                                        <strong>
                                            <a href="{{ url('orders/details/'.$order->id) }}" class="btn btn-outline-info"><i class="fa fa-eye"></i></a>
                                            
                                            
                                            <a href="{{ route('orders.delete', $order->id) }}" class="btn btn-outline-danger">
                                                <i class="fa fa-times"></i> 
                                            </a>
                                        </strong>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="4" class="text-center">No Orders Yet! </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            @if($orders && count($orders))
                                {{ $orders->links() }}
                            @else
                            @endif
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>


@endsection
