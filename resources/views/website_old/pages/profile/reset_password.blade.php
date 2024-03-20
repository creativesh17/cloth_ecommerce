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
                                @if (session()->has('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                <form action="#" class="account-details-form mt-4" method="POST">
                                    @csrf
                                    <fieldset>
                                        <legend>Password Reset</legend>
                                        <div class="single-input-item">
                                            <label for="current-pwd" class="required">Current Password</label>
                                            <input type="password" name="old_password" id="current-pwd" />
                                            @error('old_password') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="single-input-item">
                                                    <label for="new-pwd" class="required">New Password</label>
                                                    <input type="password" name="newpassword" id="new-pwd" />
                                                    @error('newpassword') <span class="text-danger error">{{ $message }}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="single-input-item">
                                                    <label for="confirm-pwd" class="required">Confirm Password</label>
                                                    <input type="password" name="newpassword_confirmation" id="confirm-pwd" />
                                                    @error('newpassword') <span class="text-danger error">{{ $message }}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-input-item">
                                            <button class="check-btn sqr-btn" wire:click.prevent="updatePassword">Update Password</button>
                                        </div>
                                    </fieldset>
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
