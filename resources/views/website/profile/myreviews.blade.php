@extends('website.layouts.app',[
    'meta' => [
        "title" => "My Reviews",
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Review Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($reviews as $key=>$review)
                                {{-- @dd($review->product->product_name) --}}
                                    {{-- @foreach($order->order_details as $key=>$product) --}}
                                    {{-- @dd($product) --}}
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $review->product->product_name }}</td>
                                        <td>{{ $review->review_description }}</td>
                                        <td>
                                            <a href="{{ url('myreviews/'.$review->id) }}" class="btn btn-outline-danger"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    {{-- @endforeach --}}
                                    {{-- @endforeach --}}
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">No Reviews Yet! </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            {{ $reviews->links() }}
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
