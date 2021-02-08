@if ($errors->any())
{{--    <div class="container">--}}
    	<div class="row">
    		<div class="col-md-12">
    			<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
    		</div>
    	</div>
{{--    </div>--}}
@endif
@if(session()->has('success'))
	<p class="alert alert-success">{{ session()->get('success') }}</p>
@endif
@if(session()->has('warning'))
	<p class="alert alert-danger">{{ session()->get('warning') }}</p>
@endif
