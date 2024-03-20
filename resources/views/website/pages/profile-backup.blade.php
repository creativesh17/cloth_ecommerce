@extends('website.layouts.app',[
    'meta' => [
        "title" => "Customer Profile",
    ],
])



@section('content')

<div>
    <div class="d-flex align-items-start">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link active" id="v-pills-dashboard-tab" data-bs-toggle="pill" data-bs-target="#v-pills-dashboard" type="button" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">Dashboard</button>

            <button class="nav-link" id="v-pills-orders-tab" data-bs-toggle="pill" data-bs-target="#v-pills-orders" type="button" role="tab" aria-controls="v-pills-orders" aria-selected="false">Orders</button>

            <button class="nav-link" id="v-pills-reset-tab" data-bs-toggle="pill" data-bs-target="#v-pills-reset" type="button" role="tab" aria-controls="v-pills-reset" aria-selected="false">Reset Password</button>

            <button class="nav-link" id="v-pills-logout-tab" data-bs-toggle="pill" data-bs-target="#v-pills-logout" type="button" role="tab" aria-controls="v-pills-logout" aria-selected="false">Logout</button>
        </div>


        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab">
            erererewrewr
            </div>

            <div class="tab-pane fade" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">
erewrewrewrewrew
            </div>

            <div class="tab-pane fade" id="v-pills-reset" role="tabpanel" aria-labelledby="v-pills-reset-tab">
rewrewrewrewrewr
            </div>            

            <div class="tab-pane fade" id="v-pills-logout" role="tabpanel" aria-labelledby="v-pills-logout-tab">

            </div>
        </div>

    </div>
</div>


@endsection
