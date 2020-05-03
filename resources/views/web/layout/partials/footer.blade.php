<!-- Footer Section Starts -->
<footer id="footer-area">
	<!-- Footer Links Starts -->
		<div class="footer-links">
		<!-- Container Starts -->
			<div class="container">
                <div class="row">
				    <div class="col-md-2"></div>
				<!-- My Account Links Starts -->
                    
					<div class="col-md-3 text-center text-md-left">
						<h5>Productos</h5>
						<ul>
                            @foreach($rubros as $rubro)
                            <li><a href="{{ route('tienda.rubro', $rubro->slug) }}">{{ $rubro->name }}</a></li>
                            @endforeach
							
						</ul>
					</div>
				<!-- My Account Links Ends -->					
				
				<!-- Follow Us Links Starts -->
					<div class="col-md-3 text-center text-md-left">
						<h5>Follow Us</h5>
						<ul>
							<li><a href="#">Facebook</a></li>
							<li><a href="#">Instagram</a></li>
						</ul>
					</div>
				<!-- Follow Us Links Ends -->
				<!-- Contact Us Starts -->
					<div class="col-md-3 text-center text-md-left">
						<h5>Contactactanos</h5>
						<ul>
							<li>Plastitodo</li>
							<li>
								Baigorria 1306, Rosario Santa Fé
							</li>
							<li>
								Email: <a href="#">contacto@plastitodo.com.ar</a>
							</li>								
						</ul>
						<h4 class="lead">
							Tel: <span>1(234) 567-9842</span>
						</h4>
					</div>
                    <div class="col-md-2"></div>
                
				<!-- Contact Us Ends -->
                </div>
			</div>
		<!-- Container Ends -->
		</div>
	<!-- Footer Links Ends -->
	
	</footer>
<!-- Footer Section Ends -->