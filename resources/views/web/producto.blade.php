@extends('web.layout.app')
@section('content')

<!-- Main Container Starts -->
<div id="main-container" class="container">
		<div class="row">
		
		<!-- Sidebar Starts -->
			<div class="col-md-3">
			<!-- Categories Links Starts -->
                @if($stockproduct->category->subrubro->categories->count() != 1)
                <div class="mb-3">
                    <h3 class="side-heading">Categorias</h3>
                    <div class="list-group categories">
                        @foreach($stockproduct->category->subrubro->categories->sortBy('name') as $relatedcategory)
                        <a href="{{ route('tienda.category', [$relatedcategory->slug]) }}" class="list-group-item @if($stockproduct->category->id == $relatedcategory->id) active @endif">
                            <i class="fa fa-chevron-right"></i>
                            {{ $relatedcategory->name }}
                        </a>
                        @endforeach
                        
                    </div>
                </div>
                @endif
			<!-- Categories Links Ends -->
            <!-- Categories Links Starts -->
				<div class="d-none d-lg-block">
					<h3 class="side-heading">{{ $stockproduct->category->subrubro->rubro->name }}</h3>
					<div class="list-group categories">
						@foreach($stockproduct->category->subrubro->rubro->subrubros->sortBy('name') as $subrubrorelated)
							@if($subrubrorelated->categories->count())
								@if($subrubrorelated->categories->count() == 1 )
								<a href="{{ route('tienda.category', [$subrubrorelated->categories->first()->slug]) }}" class="list-group-item @if($stockproduct->category->id == $subrubrorelated->categories->first()->id) active @endif">
									<i class="fa fa-chevron-right"></i>
									{{ $subrubrorelated->categories->first()->name }}
								</a>
								@else
								<a href="{{ route('tienda.subrubro', [$subrubrorelated->slug]) }}" class="list-group-item @if($stockproduct->category->subrubro->id == $subrubrorelated->id) active @endif">
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
			<div class="col-md-9">
            <!-- Breadcrumb Starts -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('tienda.category', [$stockproduct->category->slug]) }}">{{ $stockproduct->category->name }}</a></li>
                </ol>
                </nav>
				
			<!-- Breadcrumb Ends -->
			<!-- Product Info Starts -->
				<div class="row product-info">
                <!-- Left Starts -->
                    <div class="col-sm-5 pr-sm-0 imageGallery1">
                        <div class="row">
                        <!-- {{   $index = 1 }} --> 
                        @foreach($stockproduct->images->sortBy('posicion') as $img)
                            @if($index == 1)
                            <div class="col-12">
                                <a href="/images/{{ $img->name }}"><img src="/images/{{ $img->name }}" alt="Gallery image 2" class="img-fluid img-thumbnail" /></a>
                            </div>
                            @elseif($index == 2)
                            <div class="col-4 pr-0">
                                <a href="/images/{{ $img->name }}"><img src="/images/thumbnails/{{ $img->name }}" alt="Gallery image 2" class="img-fluid img-thumbnail" /></a>
                            </div>
                            @elseif($index == 3)
                            <div class="col-4 pr-2 pl-2">
                                <a href="/images/{{ $img->name }}"><img src="/images/thumbnails/{{ $img->name }}" alt="Gallery image 2" class="img-fluid img-thumbnail" /></a>
                            </div>
                            @elseif($index == 4)
                            <div class="col-4 pl-0">
                                <a href="/images/{{ $img->name }}"><img src="/images/thumbnails/{{ $img->name }}" alt="Gallery image 2" class="img-fluid img-thumbnail" /></a>
                            </div>
                            @endif
                            <!-- {{   $index ++ }} -->
                        @endforeach
						@if($stockproduct->images->count() == 0)
							<div class="col-12">
                                <a href="/images/img-default.jpg"><img src="/images/img-default.jpg" alt="Gallery image 2" class="img-fluid img-thumbnail" /></a>
                            </div>
						@endif

                        

                            
                        </div>
                        
                    </div>



					
				<!-- Left Ends -->
				<!-- Right Starts -->
					<div class="col-sm-7 mt-3 mt-sm-0 product-details">
					<!-- Product Name Starts -->
                        <h5>Código: {{ $stockproduct->id }}</h5>
						<h2>{{ $stockproduct->name }}</h2>
					<!-- Product Name Ends -->
						<hr />
                    <!-- Manufacturer Starts -->
                        <div>
                            {!! $stockproduct->comentario; !!}
                        </div>
                        
					<!-- Manufacturer Ends -->
						<hr />
					<!-- Consultar Starts -->
						<div class="d-flex justify-content-end">
                            <a class="btn btn-success rounded-0" href="{{ route('contact.product', $stockproduct->id) }}">Consultar por este producto</a>
                        </div>
					<!-- Consultar Ends -->
					
						
					</div>
				<!-- Right Ends -->
				</div>
			<!-- product Info Ends -->
			
			
            <!-- Related Products Starts -->
                
				<div class="product-info-box mt-3">
					<h4 class="heading">Productos Relacionados</h4>
				<!-- Products Row Starts -->
					<div class="row">
                    @foreach($stockproduct->category->stockproducts->sortBy('name') as $relatestockproduct)
                    @if($stockproduct->id != $relatestockproduct->id)
						@if($relatestockproduct->web_enable)
						<!-- Product #1 Starts -->
							<div class="col-md-4 col-sm-6">
								<div class="product-col">
									<div class="image">
									@if($relatestockproduct->images->first())
									<div class="col-12">
										<a href="{{ route('tienda.producto', [$relatestockproduct->slug]) }}"><img src="/images/{{ $relatestockproduct->images->first()->name }}" alt="Gallery image 2" class="img-fluid" /></a>
									</div>
									@else
									<div class="col-12">
									<a href="{{ route('tienda.producto', [$relatestockproduct->slug]) }}"><img src="/images/img-default.jpg" alt="Gallery image 2" class="img-fluid" /></a>
									</div>
									@endif
										
									</div>
									<div class="caption">
										<h4><a href="{{ route('tienda.producto', [$relatestockproduct->slug]) }}">{{ $relatestockproduct->name }}</a></h4>
										<div class="description">
											
										</div>
										
									</div>
								</div>
							</div>
						<!-- Product #1 Ends -->
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

@push('scripts')
<script src="/vendor/simpleLightBox/simpleLightbox.min.js"></script>
<script>
    // using plain js
    new SimpleLightbox({elements: '.imageGallery1 a'});


</script>

@endpush
@endsection