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
					<div class="col-sm-4">
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
					<div class="col-sm-8">
						<div class="panel panel-smart">
							<div class="panel-heading">
								<h3 class="panel-title">Envianos un email</h3>
							</div>
							<div class="panel-body">
								<form method="POST" ><input name="_method" type="hidden" value="PUT"><input name="_token" type="hidden" value="HTQZzVjp5uetJscbUo1CAJ9RyT3kFhDxzlNBPhMb">
									<div class="form-group row">
										<label for="name" class="col-sm-2 col-form-label text-sm-right">Nombre</label>
										<div class="col-sm-10">
											<input class="form-control" name="name" type="text" id="name">
											<ul class="mb-0 text-danger">
											</ul>
										</div>
									</div>

									<div class="form-group row">
										<label for="email" class="col-sm-2 col-form-label text-sm-right">Email</label>
										<div class="col-sm-10">
											<input class="form-control" name="email" type="text" id="email">
											<ul class="mb-0 text-danger">
											</ul>
										</div>
									</div>

									<div class="form-group row">
										<label for="phone" class="col-sm-2 col-form-label text-sm-right">Teléfono</label>
										<div class="col-sm-10">
											<input class="form-control" name="phone" type="text" id="phone">
											<ul class="mb-0 text-danger">
											</ul>
										</div>
									</div>

									<div class="form-group row">
										<label for="subject" class="col-sm-2 col-form-label text-sm-right">Asunto</label>
										<div class="col-sm-10">
											<input class="form-control" name="subject" type="text" id="subject">
											<ul class="mb-0 text-danger">
											</ul>
										</div>
									</div>

									<div class="form-group row">
										<label for="message" class="col-sm-2 col-form-label text-sm-right">Mensaje</label>
										<div class="col-sm-10">
											<textarea class="form-control" id="message" name="message" rows="5"></textarea>
										</div>
									</div>
								

									<div class="form-group row">
										<div class="col-sm-10 offset-sm-2">
											<input class="btn btn-black" type="submit" value="Enviar">
											
										</div>
									</div>

             				 	</form>
								
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