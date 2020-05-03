@extends('web.app')
@section('content')

<!-- Main Container Starts -->
<div id="main-container" class="container">
		<div class="row">
			
			
			<!-- Sidebar Ends -->
			<!-- Primary Content Starts -->
			<div id="app" class="col-12">

				
				<!-- Related Products Starts -->
                <div class="product-info-box mt-3">
					<h4 class="heading">Buscando: <strong>{{ $q }}</strong></h4>
				<!-- Products Row Starts -->
					<div class="row">
                    @foreach($stockproducts->sortBy('name') as $stockproduct)
							<div class="col-sm-6 col-lg-4">
								<div class="product-col">
									<div class="image">
									@if(false)
									<div class="col-12">

										<a href="{{ route('tienda.producto', [$stockproduct->category->subrubro->rubro->slug, $stockproduct->slug]) }}"><img src="/images/{{ $stockproduct->images->first()->name }}" alt="Gallery image 2" class="img-fluid" /></a>
									</div>
									@else
									<div class="col-12">
									<a href="{{ route('tienda.producto', [$stockproduct->category->subrubro->rubro->slug, $stockproduct->slug]) }}"><img src="https://i.picsum.photos/id/{{ rand(1, 500) }}/800/600.jpg" alt="Gallery image 2" class="img-fluid" /></a>
									</div>
									@endif
										
									</div>
									<div class="caption text-center">
										<h6><a class="text-muted" href="{{ route('tienda.category', [$stockproduct->category->subrubro->rubro->slug, $stockproduct->category->slug]) }}">{{ $stockproduct->category->name }}</a></h6>
										<h4><a href="{{ route('tienda.producto', [$stockproduct->category->subrubro->rubro->slug, $stockproduct->slug]) }}">{{ $stockproduct->name }}</a></h4>
										<div class="description">
											
										</div>
										
									</div>
								</div>
							</div>
					@endforeach
							
					
                    <button-counter></button-counter>
                    
					
					</div>
				<!-- Products Row Ends -->
				</div>
				
				
			<!-- Related Products Ends -->
			</div>
		
			
			
		<!-- Primary Content Ends -->
		</div>
	</div>
<!-- Main Container Ends -->



@push('scripts')

@endpush

@endsection
