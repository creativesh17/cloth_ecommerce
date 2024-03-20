@extends('layouts.website') @section('content')


<section class="checkout_area section_gap">
    <div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-success" role="alert">
					<strong>Success!</strong> {{ session('success') }}
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Checkout Area =================-->
@endsection
