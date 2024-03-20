@extends('website.layouts.app')
@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                @include('website.pages.profile.sidemenu')
            </div>

            <div class="col-lg-9 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3>Billing Address</h3>
                        <br>
                        <form action="" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <div class="form-group mb-4">
                                <label for="">
                                    Full Name
                                </label>
                                <div class="mt-3">
                                    <input type="form-control" value="{{$address->first_name}}" name="first_name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="">
                                    Mobile Number
                                </label>
                                <div class="mt-3">
                                    <input type="form-control" value="{{$address->mobile_number}}" name="mobile_number" class="form-control">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="">
                                    Email
                                </label>
                                <div class="mt-3">
                                    <input type="form-control" value="{{$address->email}}" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="">
                                    Address
                                </label>
                                <div class="mt-3">
                                    <textarea type="form-control"  name="address" class="form-control">{{$address->address}}</textarea>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="">
                                    City
                                </label>
                                <div class="mt-3">
                                    <input type="form-control" value="{{$address->city}}" name="city" class="form-control">
                                </div>
                            </div>
                            <div class="mb-4">
                                <button class="btn btn-success">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@endsection
