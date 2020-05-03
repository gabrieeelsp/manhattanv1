@extends('web.layout.app')
@section('content')

<!-- Main Container Starts -->
<div id="main-container" class="container">
		<div class="row">
		
			<!-- Sidebar Starts -->
			<div class="d-none d-lg-block col-md-3">
			<!-- Categories Links Starts -->
				<h3 class="side-heading">{{ $rubro->name }}</h3>
				<div class="list-group categories">
					@foreach($rubro->subrubros->sortBy('name') as $subrubro)
						@if($subrubro->categories->count())
							@if($subrubro->categories->count() == 1 )
							<a href="{{ route('tienda.category', [$subrubro->categories->first()->slug]) }}" class="list-group-item {{ setActive(['tienda/categoria/'.$subrubro->categories->first()->slug.'*' ]) }}">
								<i class="fa fa-chevron-right"></i>
								{{ $subrubro->categories->first()->name }}
							</a>
							@else
							<a href="{{ route('tienda.subrubro', [$subrubro->slug]) }}" class="list-group-item {{ setActive(['tienda/rubro/'.$subrubro->slug.'*' ]) }}">
								<i class="fa fa-chevron-right"></i>
								{{ $subrubro->name }}
							</a>

							@endif
						@endif
					@endforeach



					
					
				</div>

			<!-- Categories Links Ends -->

			</div>
			<!-- Sidebar Ends -->

			<!-- Primary Content Starts -->
			<div class="col-lg-9">
				<!-- Breadcrumb Starts -->
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="/">Home</a></li>
						<li class="breadcrumb-item"><a href="{{ route('tienda.rubro', $rubro->slug) }}">{{ $rubro->name }}</a></li>
					</ol>
					</nav>
					
				<!-- Breadcrumb Ends -->
				<!-- Related Products Starts -->
                
				<div class="product-info-box mt-3">
					<h4 class="heading">{{ $rubro->name }}</h4>
				<!-- Products Row Starts -->
					<div class="row">
                    @foreach($rubro->subrubros->sortBy('name') as $subrubro)
						@if($subrubro->categories->count())
							@if($subrubro->categories->count() == 1 )
							<div class="col-md-6 col-sm-6 ">
								<div class="product-col">
									<div class="image">
									@if($subrubro->categories->first()->images->count())
									<div class="col-12">
										<a href="{{ route('tienda.category',[$subrubro->categories->first()->slug]) }}"><img src="/images/{{ $subrubro->categories->first()->images->sortBy('posicion')->first()->name }}" alt="Gallery image 2" class="img-fluid" /></a>
									</div>
									@else
									<div class="col-12">
									<a href="{{ route('tienda.category', [$subrubro->categories->first()->slug]) }}"><img src="/images/img-default.jpg" alt="Gallery image 2" class="img-fluid" /></a>
									</div>
									@endif
										
									</div>
									<div class="caption text-center">
										<h4><a href="{{ route('tienda.category', [$subrubro->categories->first()->slug]) }}">{{ $subrubro->categories->first()->name }}</a></h4>
										<div class="description">
											
										</div>
										
									</div>
								</div>
							</div>
							@else
							<div class="col-md-6 col-sm-6">
								<div class="product-col">
									<div class="image">
									@if($subrubro->images->count())
									<div class="col-12">
										<a href="{{ route('tienda.subrubro', [$subrubro->slug]) }}"><img src="/images/{{ $subrubro->images->first()->name }}" alt="Gallery image 2" class="img-fluid" /></a>
									</div>
									@else
									<div class="col-12">
									<a href="{{ route('tienda.subrubro', [$subrubro->slug]) }}"><img src="/images/img-default.jpg" alt="Gallery image 2" class="img-fluid" /></a>
									</div>
									@endif
										
									</div>
									<div class="caption text-center">
										<h4><a href="{{ route('tienda.subrubro', [$subrubro->slug]) }}">{{ $subrubro->name }}</a></h4>
										<div class="description">
											
										</div>
										
									</div>
								</div>
							</div>

							@endif
						@endif
					@endforeach
					
                    
                    
					
					</div>
				<!-- Products Row Ends -->
				</div>
			<!-- Related Products Ends -->
			</div>
		<!-- Primary Content Ends -->
		</div>
	</div>
<!-- Main Container Ends -->



@endsection