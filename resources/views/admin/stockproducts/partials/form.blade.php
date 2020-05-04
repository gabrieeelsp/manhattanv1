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
  {{ Form::label('category_id', 'Categoría', ['class' => 'col-sm-2 col-form-label text-sm-right']) }}
  <div class="col-sm-10">
    {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'id' => 'select']) }}
  </div>
</div>

<div class="form-group row">
        <div class="col-sm-2">
        
        </div>
        <div class="col-sm-10">
          <div class="form-check">
          @if(isset($subrubro))
            {{ Form::checkbox('web_enable', 1, $stockproduct->web_enable, ['class' => 'form-check-input']) }}
          @else
            {{ Form::checkbox('web_enable', 1, null, ['class' => 'form-check-input']) }}
          @endif
            {{ Form::label('web_enable', 'Vista Web', ['class' => 'form-check-label']) }}
          </div>
        </div>
</div>

<div class="form-group row">
  {{ Form::label('comentario', 'Comentarios', ['class' => 'col-sm-2 col-form-label text-sm-right']) }}
  <div class="col-sm-10">
      {{ Form::textarea('comentario', null, ['class' => 'form-control', 'id' => 'comentario']) }}
  </div>
</div>

<div class="form-group row">
  <div class="col-sm-10 offset-sm-2">
      {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
      <a href="{{ route('stockproducts.index') }}" class="btn btn-info btn-sm"> Volver</a>
  </div>
</div>

@push('scripts')
<script src="/{{ env('URL_REMOTE', '') }}vendor/select2/dist/js/select2.min.js"></script>
<script src="/{{ env('URL_REMOTE', '') }}vendor/stringToSlug/jquery.stringToSlug.min.js"></script>
<script src="/{{ env('URL_REMOTE', '') }}vendor/ckeditor/ckeditor.js"></script>
<script>
  $(document).ready(function(){
    $('#name, #slug').stringToSlug({
      callback:function(text){
        $('#slug').val(text);
      }
    });

    $("select").select2({

    });

    CKEDITOR.replace('comentario', {
      
    });
  })
</script>
@endpush