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
  {{ Form::label('phone', 'Teléfono', ['class' => 'col-sm-2 col-form-label text-sm-right']) }}
  <div class="col-sm-10">
        {{ Form::text('phone', null, [
            'class' => 'form-control' . ( $errors->has('phone') ? ' is-invalid' : '' )
            ]) }}
        <ul class="mb-0 text-danger">
            @foreach ($errors->get('phone') as $error)
                <li class="text-sm">{{ $error }}</li>
            @endforeach
        </ul>
  </div>
</div>

<div class="form-group row">
  {{ Form::label('email', 'Email', ['class' => 'col-sm-2 col-form-label text-sm-right']) }}
  <div class="col-sm-10">
        {{ Form::text('email', null, [
            'class' => 'form-control' . ( $errors->has('email') ? ' is-invalid' : '' )
            ]) }}
        <ul class="mb-0 text-danger">
            @foreach ($errors->get('email') as $error)
                <li class="text-sm">{{ $error }}</li>
            @endforeach
        </ul>
  </div>
</div>

<div class="form-group row">
  {{ Form::label('subject', 'Asunto', ['class' => 'col-sm-2 col-form-label text-sm-right']) }}
  <div class="col-sm-10">
        {{ Form::text('subject', null, [
            'class' => 'form-control' . ( $errors->has('subject') ? ' is-invalid' : '' )
            ]) }}
        <ul class="mb-0 text-danger">
            @foreach ($errors->get('subject') as $error)
                <li class="text-sm">{{ $error }}</li>
            @endforeach
        </ul>
  </div>
</div>

<div class="form-group row">
  {{ Form::label('message', 'Mensaje', ['class' => 'col-sm-2 col-form-label text-sm-right']) }}
  <div class="col-sm-10">
        {{ Form::textarea('message', null, [
            'class' => 'form-control' . ( $errors->has('message') ? ' is-invalid' : '' ),
            'rows' => '5'
            ]) }}
        <ul class="mb-0 text-danger">
            @foreach ($errors->get('message') as $error)
                <li class="text-sm">{{ $error }}</li>
            @endforeach
        </ul>
  </div>
</div>


<div class="form-group row">
  <div class="col-sm-10 offset-sm-2">
      {{ Form::submit('Guardar', ['class' => 'btn btn-black']) }}
  </div>
</div>

