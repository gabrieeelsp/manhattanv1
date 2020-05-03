<div class="form-group row">
  {{ Form::label('name', 'Nombre', ['class' => 'col-sm-2 col-form-label text-sm-right']) }}
  <div class="col-sm-10">
        {{ Form::text('name', null, [
            'class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' )
            ]) }}
        <ul class="mb-0 text-danger">
            @foreach ($errors->get('name') as $error)
              <li class="text-sm">{{ $error }}</li>
            @endforeach
        </ul>
  </div>
</div>
<div class="form-group row">
  {{ Form::label('slug', 'URL', ['class' => 'col-sm-2 col-form-label text-sm-right']) }}
  <div class="col-sm-10">
      {{ Form::text('slug', null, [
        'class' => 'form-control' . ( $errors->has('slug') ? ' is-invalid' : '' ),
        
        ]) }}
      <ul class="mb-0 text-danger">
            @foreach ($errors->get('slug') as $error)
              <li class="text-sm">{{ $error }}</li>
            @endforeach
        </ul>
  </div>
</div>
<div class="form-group row">
  {{ Form::label('subrubro_id', 'Sub-Rubro', ['class' => 'col-sm-2 col-form-label text-sm-right']) }}
  <div class="col-sm-10">
    {{ Form::select('subrubro_id', $subrubros, null, ['class' => 'form-control', 'id' => 'select']) }}
  </div>
</div>

<div class="form-group row">
        <div class="col-sm-2">
        
        </div>
        <div class="col-sm-10">
          <div class="form-check">
            {{ Form::checkbox('web_enable', null, $category->web_enable, ['class' => 'form-check-input']) }}
            {{ Form::label('web_enable', 'Vista Web', ['class' => 'form-check-label']) }}
          </div>
        </div>
</div>

<div class="form-group row">
  <div class="col-sm-10 offset-sm-2">
      {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
      <a href="{{ route('categories.index') }}" class="btn btn-info btn-sm"> Volver</a>
  </div>
</div>

@push('scripts')
<script src="/vendor/select2/dist/js/select2.min.js"></script>
<script src="/vendor/stringToSlug/jquery.stringToSlug.min.js"></script>
<script>
  $(document).ready(function(){
    $('#name, #slug').stringToSlug({
      callback:function(text){
        $('#slug').val(text);
      }
    });

    $("select").select2({

    });
  })
</script>
@endpush