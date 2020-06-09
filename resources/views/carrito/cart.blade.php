@extends('layouts.main')

@section('contenido')
@if (session('alert'))
  <div class="alert alert-success">
    {{ session('alert') }}
  </div>
@endif
  <div class="container text-center" style="background-color: white">
    <div class="page-header">
      <h1 style="margin: 5%;"><i class="fa fa-shopping-cart"></i>Carrito de compras</h1>
    </div>
    <div class="table-cart">
      @if (count($cart))
        <p>
        </p>
        <div class="table-responsive">
          <table class="table table-striped table-hover table-bordered">
            <thead>
              <tr>
                <th style="border-style: none;"></th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th style="border-style: none;"></th>
              </tr>
            </thead>
            <body>
              @foreach ($cart as $item)
                <tr>
                  <td style="border-style: none; background-color: white"><img src="/images/{{$item->imagen}}" width="50px" height="50px" ></td>
                  <td style="background-color: white">{{$item->nombre}}</td>
                  <td style="background-color: white">${{number_format($item->precio,2)}}</td>
                  <td style="background-color: white">
                    <div class="input-group" style="align-content: center;">
                    <input type="text" name="" id="input1" value="{{$item->cantidad}}" style="width: 50px;"><a onClick="this.href='/cart/id/{{$item->id}}/'+document.getElementById('input1').value" class="btn btn-dark"><i class="fa fa-chevron-circle-up" aria-hidden="true" style="background-color: white"></i></a>
                    </div>
                  </td >
                  <td >${{number_format($item->precio * $item->cantidad,2)}}</td>
                  <td style="border-style: none; background-color: white" >
                    <a href="{{route('cart-delete', $item->id)}}" class="btn btn-danger">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                </tr>
              @endforeach
            </body>
          </table><hr>
          <h3>
            <span class="label label-success">
               Total: ${{number_format($total,2)}}
            </span>
          </h3>
        </div>
    @else
      <h3><span class="label label-warning">No hay productos en el carrito</span></h3>
    @endif
    <hr>
    <p>
      <a href="{{route('articulos')}}" class="btn btn-dark">
        <i class="fa fa-chevron-circle-left"></i>Seguir comprando
      </a>
      @guest
      @else
      {!! Form::open(array('url'=>'payment','method'=>'POST')) !!}
      {{Form::token()}}
                    <script
                    src="https://checkout.stripe.com/checkout.js" 
                    class="stripe-button" 
                    data-key="pk_test_51Gqm4ICBKZMkd2pe6RxRG0RKjDdwPXlwSAxUeL14dKuS8aVgzD95WX69gixIwHHEJUaKQ9uId1vTYfQIoqH0NX3X00hfJQQDMp" 
                    data-amount="${{number_format($total,2)}}" 
                    data-name="{{ Auth::user()->name }}" 
                    data-description="Example charge" 
                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png" 
                    data-locale="auto" 
                    data-currency="COP"› 
                    >      
                    </script>
        </form>
        {!!Form::close()!!}
        @endguest
    </p>
    </div>
  </div>
@endsection
