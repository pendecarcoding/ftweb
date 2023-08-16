@extends('acewebfront.layouts')

@section('content')
<section style="margin: 50px;position: relative;" class="text-center py-6">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mx-auto">
				<img src="{{ static_asset('assets/img/page-expired.png') }}" class="mw-100 mx-auto mb-5" height="300">
			    <h1 class="fw-700">{{ translate('Page has expired!') }}</h1>
			    <p class="fs-16 opacity-60">{{ translate('The page has expired due to inactivity. Please refresh the page and try again.') }}</p>
                <a class="btn btn-danger" href="{{ url()->previous() }}">Go Back</a>
			</div>
		</div>
    </div>
</section>
@endsection
