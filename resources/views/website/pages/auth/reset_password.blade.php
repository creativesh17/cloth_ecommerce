@extends('website.layouts.app',[
    'meta' => [
        "title" => "Reset Password",
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

                    <div class="col-lg-9 col-md-8 ">
                        <div class="card">
                            <div class="card-body" style="padding: 20px;">
                                <h3>Manage Password</h3>
                                <form class="account-details-form account-box-padding-4 mt-4" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="single-input-item">
                                                <label for="old_password" class="required">Old Password</label>
                                                <input type="text" name="old_password" value="" id="old_password" />
                                                @error('old_password')
                                                <span class="text-danger error">
                                                    {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="single-input-item">
                                                <label for="old_password" class="required">New Password</label>
                                                <input type="text" name="newpassword" value="" id="newpassword" />
                                                @error('newpassword')
                                                <span class="text-danger error ">
                                                    {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="single-input-item">
                                                <label for="newpassword_confirmation" class="required">Confirm New Password</label>
                                                <input type="text" name="newpassword_confirmation" value="" id="newpassword_confirmation" />
                                                @error('newpassword_confirmation')
                                                <span class="text-danger error ">
                                                    {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="btn-order">
                                        <button type="submit" class="btn btn-info" title="">Update Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
