@extends('layouts.FrontHome')

@section('main_content')

<section class="page_section thankyou_01">
	<div class="nq_container">
		<div class="row">
<div class="clearfix">...</div>
<div class="clearfix">...</div>

			<div class="jumbotron text-center">
				<h1 class="display-3">Thank You!</h1>
				<p class="lead"><strong>We recivie your request .we will get back soon.</p>
				<p>
				</p>
				<p class="lead">
					<a class="btn btn-primary btn-sm" href="{{url('/')}}" role="button" title="Continue to homepage">Continue to homepage</a>
				</p>
			</div>
		</div>
	</div>
</section>

@endsection

@section('script')
<script src="{{asset('front/js/thank-you.js')}}"></script>

@endsection