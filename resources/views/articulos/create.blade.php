@extends('layouts.main')

@section('contenido')
  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"> </div>
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="background-color: white; margin-top:5%; margin-bottom: 3%">
      <h3 style="background-color: lightgray"><b>Nuevo articulo</b></h3>
      @if (count($errors)>0)
      <div class="alert alert-danger">
        <ul>
      @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
      @endif
      {!! Form::open(array('url'=>'articulos','method'=>'POST','autocomplete'=>'off','files' => true)) !!}
      {{Form::token()}}
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre"  class="form-control" placeholder="Nombre..">
      </div>
      <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <input type="text" name="descripcion"  class="form-control">
      </div>
      <div class="form-group">
        <label for="descripcion">Precio</label>
        <input type="text" name="precio"  class="form-control">
      </div>
      <div class="form-group">
        <label for="descripcion">Cantidad(Kg)</label>
        <input type="text" name="cantidad"  class="form-control">
      </div>
      <div class="form-group">
        <label for="descripcion">Categoria</label>
        <input type="text" name="categoria"  class="form-control">
      </div>
      <div class="form-group">
        <label for="imagen">Imagen</label>
        <input type="file" name="imagen"  class="form-control">
      </div>
      <div class="form-group">
        <button class="btn btn-primary" type="submit">Guardar</button>
      </div>




      {!!Form::close()!!}
      <a href="/articulos"><button class="btn btn-danger">Cancelar</button></a>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</div>
    </div>
@endsection