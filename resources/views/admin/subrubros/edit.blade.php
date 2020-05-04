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
                <h3 class="card-title" >Editar <b>Sub-Rubro</b></h3>
                
              </div>
              
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              {!! Form::model($subrubro, ['route' => ['subrubros.update', $subrubro->id], 'method' => 'PUT']) !!}
                @include('admin.subrubros.partials.form')
              {!! Form::close() !!}
                
            </div>
            <!-- /.card-body -->
            
          </div>
          <!-- /.card -->
        </div>


        <div class="col-12">
          <div class="card">
            <!-- <div class="card-header">
              <div class=" d-flex justify-content-between align-items-center">
                <h3 class="card-title" >Editar <b>PRODUCTO STOCK</b> - Imagenes</h3>
                
              </div>
              
              
            </div> -->
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                <div class="col-sm-2"></div>
                  <div class="d-flex flex-wrap col-sm-10">
                  @foreach ($subrubro->images->sortBy('posicion') as $img)
                    
                    <div class="card card-thumbnail mb-4 shadow-sm mr-2">
                      <img src="/{{ env('URL_REMOTE', '') }}images/{{ $img->name }}"  class="img-thumbnail" alt="">
                      <div class="card-body">
                        
                        <div class="d-flex justify-content-between">
                          <div class="d-flex ">
                          {{ Form::open(['route' => ['subrubros.image.setpositionfor', $subrubro->id, $img->id], 'method' => 'PUT']) }}
                            <button type="submit" class="btn btn-sm btn-info mr-1"><i class="fas fa-chevron-left"></i></button>
                          {{ Form::close() }}
                          {{ Form::open(['route' => ['subrubros.image.setpositionback', $subrubro->id, $img->id], 'method' => 'PUT']) }}
                            <button type="submit" class="btn btn-sm btn-info"><i class="fas fa-chevron-right"></i></button>
                          {{ Form::close() }}
                          </div>
                          
                          {{ Form::open(['route' => ['subrubros.subrubroImages.destroy', $subrubro->id, $img->id], 'method' => 'DELETE']) }}
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                          {{ Form::close() }}
                            
                          
                          
                        </div>
                      </div>
                    </div>
                  @endforeach
                    
                    
                  </div>
                </div>

                
                {!! Form::open(['route' => ['subrubros.subrubroImages.store', $subrubro->id], 'files' => true]) !!}
                <div class="form-group row">
                    <label  class="col-sm-2 text-right">Imagen</label>
                    <div class="input-group col-sm-10">
                      <div class="custom-file">
                        {{ Form::file('select_file', ['class' => 'custom-file-input']) }}
                        
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <button type="submit" class="input-group-text" >Upload</button>
                      </div>
                    </div>
                    <ul class="mb-0 text-danger">
                      @foreach ($errors->get('select_file') as $error)
                          <li class="text-sm">{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                  
                
                  
                {!! Form::close() !!}
                

                
            </div>
            <!-- /.card-body -->
            
          </div>
          <!-- /.card -->
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

<script type="application/javascript">
    $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });
</script>
@endpush
@endsection