@extends('web.layout.app')
@section('content')

<!-- Main Container Starts -->
<div id="main-container" class="container">
		<div class="row">
			
			<!-- Sidebar Starts -->
			<div class="d-none d-lg-block col-md-3">
			<!-- Categories Links Starts -->
				<h3 class="side-heading">{{ $subrubro->rubro->name }}</h3>
				<div class="list-group categories">
					@foreach($subrubro->rubro->subrubros->sortBy('name') as $subrubrorelated)
						@if($subrubrorelated->categories->count())
							@if($subrubrorelated->categories->count() == 1 )
							<a href="{{ route('tienda.category', [$subrubrorelated->categories->first()->slug]) }}" class="list-group-item">
								<i class="fa fa-chevron-right"></i>
								{{ $subrubrorelated->categories->first()->name }}
							</a>
							@else
							<a href="{{ route('tienda.subrubro', [$subrubrorelated->slug]) }}" class="list-group-item {{ setActive(['*/subrubro/'.$subrubrorelated->slug.'*' ]) }}">
								<i class="fa fa-chevron-right"></i>
								{{ $subrubrorelated->name }}
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
						<li class="breadcrumb-item"><a href="{{ route('tienda.rubro', $subrubro->rubro->slug) }}">{{ $subrubro->rubro->name }}</a></li>
						<li class="breadcrumb-item"><a href="{{ route('tienda.subrubro', [$subrubro->slug]) }}">{{ $subrubro->name }}</a></li>
					</ol>
				</nav>
					
				<!-- Breadcrumb Ends -->
				<!-- Related Products Starts -->
                
				<div class="product-info-box mt-3">
					<h4 class="heading">{{ $subrubro->rubro->name }}</h4>
				<!-- Products Row Starts -->
					<div class="row">
                    @foreach($subrubro->categories->sortBy('name') as $category)
							<div class="col-md-6 col-sm-6">
								<div class="product-col">
									<div class="image">
									@if($category->images->count())
									<div class="col-12">
										<a href="{{ route('tienda.category', [$category->slug]) }}"><img src="/images/{{ $category->images->sortBy('posicion')->first()->name }}" alt="Gallery image 2" class="img-fluid" /></a>
									</div>
									@else
									<div class="col-12">
									<a href="{{ route('tienda.category', [$category->slug]) }}"><img src="/images/img-default.jpg" alt="Gallery image 2" class="img-fluid" /></a>
									</div>
									@endif
										
									</div>
									<div class="caption">
										<h4><a href="{{ route('tienda.category', [$category->slug]) }}">{{ $category->name }}</a></h4>
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
		<!-- Primary Content Ends -->
		</div>
	</div>
<!-- Main Container Ends -->



@endsection