@extends('web.layout.app')
@section('content')

<!-- Main Container Starts -->
<div id="main-container" class="container">
		
		<!-- Related Products Starts -->
                
		<div class="product-info-box mt-3">
					<h4 class="heading">DESTACADOS DE LA SEMANA</h4>
				<!-- Products Row Starts -->
					<div class="row">
                    @foreach($destacados as $destacado)
							<div class="col-sm-4 col-md-3 ">
								<div class="product-col">
									<div class="image">
									@if($destacado->images->count())
									<div class="col-12">
										<a href="{{ route('tienda.producto', [$destacado->slug]) }}"><img src="/{{ env('URL_REMOTE', '') }}images/{{ $destacado->images->first()->name }}" alt="Gallery image 2" class="img-fluid" /></a>
									</div>
									@else
									<div class="col-12">
										<a href="{{ route('tienda.producto', [$destacado->slug]) }}"><img src="/{{ env('URL_REMOTE', '') }}images/img-default.jpg" alt="Gallery image 2" class="img-fluid" /></a>
									</div>
									@endif
										
									</div>
									<div class="caption text-center">
										<h4><a href="{{ route('tienda.producto', [$destacado->slug]) }}">{{ $destacado->name }}</a></h4>
										<div class="description">
											
										</div>
										
									</div>
								</div>
							</div>
							
					
					@endforeach
					
                    
                    
					
					</div>
				<!-- Products Row Ends -->
				</div>
			<!-- Related Products Ends -->
	</div>
<!-- Main Container Ends -->



@endsection