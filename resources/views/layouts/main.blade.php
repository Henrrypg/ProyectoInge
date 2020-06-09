<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/images/icon.png">
  <title>Bazar del café</title>

  <!-- Bootstrap core CSS -->
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/shop-homepage.css" rel="stylesheet">
  <link href="../../../../dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


</head>



  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="height: 50px">
    <div class="container">
      <img src="/images/icon.png" style="width: 50px; height: 50px;">
      <a class="navbar-brand" href="/articulos">Bazar del café</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/articulos">Inicio
              <span class="sr-only">(current)</span>
            </a>
              @guest
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('login') }}">Iniciar Sesión</a>
                </li>
              @if (Route::has('register'))
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('register') }}">Registro</a>
                </li>
              @endif
              @else
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                      </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                  <a class="dropdown-item" href="{{ url('/user') }}">Mis productos</a>
                  <a class="dropdown-item" href="{{ url('/ordenes') }}">Ordenes</a>
                  <a class="dropdown-item" href="{{ url('/logout') }}">Cerrar sesión</a>
                </div>
              </li>
              @endguest
              <li class="nav-item">
                <a class="nav-link" href="{{URL::action('CartController@show')}}" >Carrito</a>
              </li>
        </ul>
      </div>
    </div>
  </nav>
<body style="background:linear-gradient(rgba(47, 23, 15, 0.65), rgba(47, 23, 15, 0.65)), url('../assets/img/bg.jpg');">
  <div class="container">
    <div class="row">
      @yield('contenido')
    </div>
  </div>
</body>
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>