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
                                <h3>Account Details</h3>
                                <form class="account-details-form mt-4" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="single-input-item">
                                                <label for="first-name" class="required">Full Name</label>
                                                <input type="text" name="first_name" value="{{ auth()->user()->first_name }}" id="first-name" />
                                                @error('first_name') <span class="text-danger error">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-input-item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="email" class="required">Email Addres</label>
                                                <input type="email" name="email" value="{{ auth()->user()->email }}" id="email" />
                                                @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="phone" class="required">Mobile Number</label>
                                                <input name="mobile_number" value="{{ auth()->user()->mobile_number }}" type="text" id="phone" />
                                                @error('phone') <span class="text-danger error">{{ $message }}</span>@enderror
                                            </div>
                                            <div class="col-md-6 mt-4">
                                                <label class="required">Photo</label>
                                                <input type="file" name="photo" />
                                                <img class="my-2" style="height: 60px;" src="/{{auth()->user()->photo}}" alt="">
                                                @error('file') <span class="text-danger error">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-input-item">
                                        <button class="check-btn sqr-btn" wire:click.prevent="updateUser">Save Changes</button>
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
