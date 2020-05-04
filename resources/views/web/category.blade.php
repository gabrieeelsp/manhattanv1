@extends('web.layout.app')
@section('content')

<!-- Main Container Starts -->
<div id="main-container" class="container">
		<div class="row">
			
			<!-- Sidebar Starts -->
			<div class="col-12 col-lg-3">
			<!-- Categories Links Starts -->
				@if($category->subrubro->categories->count() != 1)
				<div class="mb-3">
					<h3 class="side-heading">{{ $category->subrubro->name }}</h3>
					<div class="list-group categories">
						@foreach($category->subrubro->categories->sortBy('name') as $categoryrelated)
							@if($categoryrelated->stockproducts->count())
								
								<a href="{{ route('tienda.category', [$categoryrelated->slug]) }}" class="list-group-item {{ setActive(['*/categoria/'.$categoryrelated->slug.'*' ]) }}">
									<i class="fa fa-chevron-right"></i>
									{{ $categoryrelated->name }}
								</a>

								
							@endif
						@endforeach
						
					</div>
				</div>
				@endif
			<!-- Categories Links Ends -->
			<!-- Categories Links Starts -->
				<div class="d-none d-lg-block">
					<h3 class="side-heading">{{ $category->subrubro->rubro->name }}</h3>
					<div class="list-group categories">
						@foreach($category->subrubro->rubro->subrubros->sortBy('name') as $subrubrorelated)
							@if($subrubrorelated->categories->count())
								@if($subrubrorelated->categories->count() == 1 )
								<a href="{{ route('tienda.category', [$subrubrorelated->categories->first()->slug]) }}" class="list-group-item {{ setActive(['*/categoria/'.$subrubrorelated->categories->first()->slug.'*' ]) }}">
									<i class="fa fa-chevron-right"></i>
									{{ $subrubrorelated->categories->first()->name }}
								</a>
								@else
								<a href="{{ route('tienda.subrubro', [$subrubrorelated->slug]) }}" class="list-group-item @if($category->subrubro->id == $subrubrorelated->id) active @endif">
									<i class="fa fa-chevron-right"></i>
									{{ $subrubrorelated->name }}
								</a>

								@endif
							@endif
						@endforeach
						
					</div>
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
						<li class="breadcrumb-item"><a href="{{ route('tienda.rubro', $category->subrubro->rubro->slug) }}">{{ $category->subrubro->rubro->name }}</a></li>
						<li class="breadcrumb-item"><a href="{{ route('tienda.category', [$category->slug]) }}">{{ $category->name }}</a></li>
					</ol>
				</nav>	
				<!-- Breadcrumb Ends -->
				<!-- Related Products Starts -->
                <div class="product-info-box mt-3">
					<h4 class="heading">{{ $category->name }}</h4>
				<!-- Products Row Starts -->
					<div class="row">
                    @foreach($category->stockproducts->sortBy('name') as $stockproduct)
							<div class="col-md-6 col-sm-6">
								<div class="product-col">
									<div class="image">
									@if($stockproduct->images->count())
									<div class="col-12">
										<a href="{{ route('tienda.producto', [$stockproduct->slug]) }}"><img src="/{{ env('URL_REMOTE', '') }}images/{{ $stockproduct->images->first()->name }}" alt="Gallery image 2" class="img-fluid" /></a>
									</div>
									@else
									<div class="col-12">
									<a href="{{ route('tienda.producto', [$stockproduct->slug]) }}"><img src="/{{ env('URL_REMOTE', '') }}images/img-default.jpg" alt="Gallery image 2" class="img-fluid" /></a>
									</div>
									@endif
										
									</div>
									<div class="caption text-center">
										<h4><a href="{{ route('tienda.producto', [$stockproduct->slug]) }}">{{ $stockproduct->name }}</a></h4>
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