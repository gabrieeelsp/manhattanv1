@extends('web.layout.app')
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
					
                    					
					<listcomponent></listcomponent>
					
					
					
					
				<!-- Products Row Ends -->
				</div>
				
				
			<!-- Related Products Ends -->
			</div>
		
			
			
		<!-- Primary Content Ends -->
		</div>
	</div>
<!-- Main Container Ends -->



@push('scripts')

<script>
Vue.component('listcomponent', {
	created: function(){
		this.getItems();
	},

    data() {
        return {
            list: [],
			page: 0,
			last_page: '',
        }
    },
    methods: {
        getItems: function(){
            this.page ++;
            //var urlItems = 'http://190.245.195.78:8000/tienda/producto_search?q={{ $q }}&page=' + this.page;
			var urlItems = '/tienda/producto_search?q={{ $q }}&page=' + this.page;
            axios.get(urlItems).then(response => {
				let posts = response.data.items.data;
				this.last_page = response.data.items.last_page;
				if(posts.length){
					
					this.list = this.list.concat(posts)
				}else{
					
				}
            });
		},
    },
    template: `
                <div>
				<div class="row">
					<div class="col-sm-6 col-lg-4" v-for="item in list">
						<div class="product-col">
							<div class="image">
								
								<div class="col-12">
									<a v-show="item.img" :href="'/tienda/producto/' + item.slug"><img v-bind:src="'/images/' + item.img" alt="Gallery image 2" class="img-fluid" /></a>
									<a v-show="!item.img" :href="'/tienda/producto/' + item.slug"><img v-bind:src="'/images/img-default.jpg'" alt="Gallery image 2" class="img-fluid" /></a>
								</div>
								
									
								</div>
								<div class="caption text-center">
									<h6><a class="text-muted" :href="'/tienda/categoria/' + item.category_slug">@{{ item.category_name }}</a></h6>
									<h4><a :href="'/tienda/producto/' + item.slug">@{{ item.name }}</a></h4>
									<div class="description">
										
									</div>
									
								</div>
						</div>
					</div>
				</div>
				<div class="row">
						<div class="col-12 d-flex justify-content-center">
							<button class="btn btn-sm btn-outline-secondary" @click="getItems()" v-show="page != last_page"  >Cargar Mas</button>
						</div>
					</div>
                </div>

                `
});

new Vue({ 
	el: '#app'
})

</script>
@endpush

@endsection
