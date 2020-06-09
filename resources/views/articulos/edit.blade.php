@extends('layouts.main')

@section('contenido')
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"> </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="background-color: white; margin-top:5%; margin-bottom: 3%">
      <h2 style="background-color: lightgray"><b>Editar</b></h2>
      <h3>{{$articulos->nombre}}</h3>
      @if (count($errors)>0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
      @endif
      {!! Form::model($articulos,['method'=>'PATCH','route'=>['articulos.update',$articulos->id]]) !!}
      {{Form::token()}}
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre"  class="form-control" value="{{$articulos->nombre}}" placeholder="Nombre..">
      </div>
      <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <input type="text" name="descripcion"  class="form-control" value="{{$articulos->descripcion}}" placeholder="Descripcion..">
      </div>
      <div class="form-group">
        <label for="cantidad">cantidad(Kg)</label>
        <input type="text" name="cantidad"  class="form-control" value="{{$articulos->cantidad}}" placeholder="cantidad..">
      </div>
      <div class="form-group">
        <label for="categoria">categoria(Kg)</label>
        <input type="text" name="categoria"  class="form-control" value="{{$articulos->categoria}}" placeholder="categoria..">
      </div>
      <div class="form-group">
        <label for="precio">Precio</label>
        <input type="text" name="precio"  class="form-control" value="{{$articulos->precio}}" placeholder="precio..">
      </div>
      <div class="form-group">
        <label for="descripcion">Imagen</label>
        <input type="File" name="imagen"  class="form-control" value="{{$articulos->imagen}}" placeholder="imagen..">
      </div>
      <div class="form-group">
        <button class="btn btn-primary" type="submit">Guardar</button>
          
      </div>

      {!!Form::close()!!}
      <a href="{{ URL::previous() }}"><button class="btn btn-danger" type="reset">Cancelar</button></a>
    </div>
@endsection
