@extends('layouts.starter')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div id="app" class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          
        </div><!-- /.col -->
        
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <!-- Main row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header table-title">
              <div class=" d-flex justify-content-between align-items-center">
                <h3 class="card-title" >Editar <b>PRODUCTO VENTA</b> - Datos</h3>
                
              </div>
              
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              {!! Form::model($saleproduct, ['route' => ['stockproducts.saleproducts.update', $stockproduct->id, $saleproduct->id], 'method' => 'PUT']) !!}
                @include('admin.saleproducts.partials.form')
              {!! Form::close() !!}
                
            </div>
            <!-- /.card-body -->
            
          </div>
          <!-- /.card -->
        </div>
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class=" d-flex justify-content-between align-items-center">
                <h3 class="card-title" >Editar <b>PRODUCTO VENTA</b> - Imágenes</h3>
                
              </div>
              
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <form action="">
                
              
              </form>
                
            </div>
            <!-- /.card-body -->
            
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@push('scripts')
<script>
  @if (session()->get('success'))

    toastr.success("{{ session()->get('success')  }}");     
  @endif
  @if (session()->get('info'))

    toastr.info("{{ session()->get('info')  }}");     
  @endif

</script>
@endpush
@endsection