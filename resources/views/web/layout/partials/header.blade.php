<!-- Header Section Starts -->
<header id="header-area">
	<!-- Header Top Starts -->
		<div class="header-top">
			<div class="container">
				<div class="row">
                    <div class="col-12 d-flex justify-content-between">
                        <span>Baigorria 1306, Rosario</span>
                        <span><i class="fab fa-whatsapp"></i> +54 9 341 5 000306</span>
                    </div>
				</div>
			</div>
		</div>
	<!-- Header Top Ends -->
	<!-- Main Header Starts -->
		<div class="main-header">
			<div class="container">
				<div class="row">
				
				<!-- Logo Starts -->
				<div class="col-md-4 col-lg-4">
					<div id="logo">
						<a href="/" class="d-flex justify-content-center"><img src="/images/logo.png"  title="Spice Shoppe" alt="Spice Shoppe" class="img-fluid" /></a>
					</div>
				</div>
				<!-- Logo Starts -->
				<div class="col-md-2 col-lg-3"></div>
				<!-- Search Starts -->
				<div class="col-md-6 col-lg-5">
						<div id="search">
							{!! Form::open(['route' => ['tienda.search'], 'method' => 'GET']) !!}
							<div class="input-group">
							    <input name="q" type="text" class="form-control" placeholder="Buscar...">
                                <div class="input-group-append">
									<button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                                    
                                </div>
							</div>
							{{ Form::close() }}
						</div>	
					</div>
				<!-- Search Ends -->				
				
				</div>
			</div>
		</div>
	<!-- Main Header Ends -->
	<!-- Main Menu Starts -->

		<!-- Static navbar -->
		<nav id="main-menu" class="navbar navbar-expand-md navbar-dark">
			<div class="container">
                <a class="d-md-none navbar-brand" href="#">Menu</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
                        <li class="nav-item {{ setActive(['/' ]) }}">
                            <a class="nav-link" href="#">Inicio</a>
                        </li>

						@foreach($rubros as $rubro)
						<li class="d-md-none nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ $rubro->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								@foreach($rubro->subrubros->sortBy('name') as $subrubro)
									@if($subrubro->categories->count())
										@if($subrubro->categories->count() == 1 )
										<li><a class="dropdown-item" href="{{ route('tienda.category', [$subrubro->categories->first()->slug]) }}">{{ $subrubro->categories->first()->name }}</a></li>
										@else
										<li><a class="dropdown-item dropdown-toggle" href="#">{{ $subrubro->name }}</a>
											<ul class="dropdown-menu">
												@foreach($subrubro->categories->sortBy('name') as $category)
												<li><a class="dropdown-item" href="{{ route('tienda.category', [$subrubro->categories->first()->slug]) }}"> - {{ $category->name }}</a></li>
												@endforeach
												
											</ul>
										</li>
										@endif
									@endif
								@endforeach
                                
                            </ul>
                        </li>
						@endforeach
						@foreach($rubros as $rubro)
						<li class="nav-item 
							@if(isset($rubro_id))
								@if($rubro_id == $rubro->id) active @endif
							@endif
							">
                            <a class="d-none d-md-block nav-link" href="{{ route('tienda.rubro', [$rubro->slug]) }}">{{ $rubro->name }}</a>
                        </li>
						@endforeach
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">Contacto</a>
                        </li>
                        
                    </ul>
                </div>
			</div>
		</nav>





		
	<!-- Main Menu Ends -->
	</header>
<!-- Header Section Ends -->