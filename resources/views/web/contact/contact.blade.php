@extends('web.layout.app')
@section('content')

<!-- Main Container Starts -->
<div id="main-container" class="container">
		<div class="row">
			
			
			<!-- Primary Content Starts -->
			<div class="col-12">
				<!-- Breadcrumb Starts -->
				<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="/">Home</a></li>
						<li class="breadcrumb-item"><a href="{{ route('contact') }}">Contacto</a></li>
					</ol>
				</nav>	
				<!-- Breadcrumb Ends -->
				<!-- Related Products Starts -->
                <div class="product-info-box mt-3">
					<h4 class="heading">Comunicate con nosotros</h4>
				<!-- Products Row Starts -->
					<!-- Starts -->
				<div class="row">
				<!-- Contact Details Starts -->
					<div class="col-md-5 col-lg-4">
						<div class="panel panel-smart">
							<div class="panel-heading">
								<h3 class="panel-title">Contacto</h3>
							</div>
							<div class="panel-body">
								
								<ul class="list-unstyled contact-details">
									<li class="clearfix">
										<i class="fa fa-home float-left"></i>
										<span class="float-left">
											Plastitodo <br />
											Baigorria 1306 Rosario, Santa Fé
										</span>
									</li>
									<li class="clearfix">
										<i class="fa fa-phone float-left"></i>
										<span class="float-left">
											91 99887 74455 <br />
											001 123 974 9856
										</span>
									</li>
									<li class="clearfix">
										<i class="fa fa-envelope float-left"></i>
										<span class="float-left">
											contacto@plastitodo.com.ar <br />
											carolina@plastitodo.com.ar <br />
											irina@plastitodo.com.ar <br />
											ivana@plastitodo.com.ar
										</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				<!-- Contact Details Ends -->
				<!-- Contact Form Starts -->
					<div class="col-md-7 col-lg-8 mt-2 mt-md-0">
						<div class="panel panel-smart">
							<div class="panel-heading">
								<h3 class="panel-title">Envianos un email</h3>
							</div>
							<div class="panel-body panel-email">
								{!! Form::open(['route' => 'contact.send_mail']) !!}
									@include('web.contact.partials.form')
								{!! Form::close() !!}

							
								
								
							</div>
						</div>
					</div>
				<!-- Contact Form Ends -->
				</div>
			<!-- Ends -->
				<!-- Products Row Ends -->
				</div>
				
				
			<!-- Related Products Ends -->
			</div>
		
			
			
		<!-- Primary Content Ends -->
		</div>
	</div>
<!-- Main Container Ends -->



@endsection