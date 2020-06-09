@extends('layouts.main')

@section('contenido')
@if (session('alert'))
  <div class="alert alert-success">
    {{ session('alert') }}
  </div>
@endif
<div class="col-lg-3" style="background:linear-gradient(rgba(47, 23, 15, 0.65), rgba(47, 23, 15, 0.65)), url('assets/img/bgg1.jpg');">
        <h1 class="my-4" style="color: white;">Buscar en publicaciones</h1>
        <div>
         @include('articulos/search')
        </div>
</div>
<div class="col-lg-9" style="background:linear-gradient(rgba(47, 23, 15, 0.65), rgba(47, 23, 15, 0.65)), url('assets/img/bgg1.jpg');">
<div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="assets/img/carrusel1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="assets/img/carrusel2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="assets/img/carrusel3.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
          </a>
        </div>

        <div class="row">
        @foreach ($articulos as $art)
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <img class="card-img-top" src="/images/{{$art->imagen}}" alt="">
              <div class="card-body">
                <h4 class="card-title">
                  <h4>{{$art->nombre}}</h4>
                </h4>
                <h5>${{$art->precio}}</h5>
                <p><b>Vendedor:</b> 
                @foreach ($users as $user1)
                  @if ($user1->id == $art->user)
                    {{$user1->name}}
                  @endif
                  @endforeach
                </p>
                <p>
                  <b>Categoria: </b>{{$art->categoria}}
                </p>
                <p class="card-text">{{$art->descripcion}}</p>
                <a href="{{URL::action('CartController@add',$art->id)}}" class="btn btn-info btn-lg" style='font-size:15px'>Agregar 
          <i class='fas fa-cart-plus'></i></a>
              </div>
              <div class="card-footer">
                <small class="text-muted">
                    @for ($i = 0; $i < $art->estrellas; $i++)
                      @if ($art->estrellas-$i < 1)
                        @if ($art->estrellas-$i > 0)
                          &#10029;
                        @endif
                      @else
                        &#9733;
                      @endif
                    @endfor
                  @for ($i = 0; $i < 5-$art->estrellas; $i++)
                    @if (5-$art->estrellas-$i >= 1)
                      &#9734;
                    @endif
                  @endfor
                </small>
              </div>
            </div>
          </div>
        @endforeach
        </div>
</div>
@endsection