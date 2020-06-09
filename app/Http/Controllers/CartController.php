<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\articulo;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
      //$this->middleware('usuario');
      if(!\Session::has('cart')) \Session::put('cart',array());// si no existe la vaiable la crea y creo un array
    }

    
    public function add($id)
    {
      $articulo=Articulo::find($id);
      $unidades=$articulo->cantidad;
        if ($unidades>0) {
          $cart= \Session::get('cart');
          $articulo->cantidad=1;
          $cart[$articulo->id]=$articulo;
          \Session::put('cart', $cart);
          return redirect()->route('cart-show');
        }
        else {
          return view('articulos');
        }
    }  
    public function show(){
      $cart= \Session::get('cart');
      $total = $this->total();
      return view('carrito.cart', compact('cart','total'));
    }

    private function total()
    {
      $cart= \Session::get('cart');
      $total=0;

      foreach ($cart as $item) {
        
          $total+=$item->precio * $item->cantidad;
      }
      return $total;
    }

    public function trash()
    {
      \Session::forget('cart');
      return redirect()->route('cart-show');
    }

    public function cantidad(string $id, string $cantidad)
    {
      $cart= \Session::get('cart');
      $articulos=Articulo::find($id);
      if($cantidad<=$articulos->cantidad){
      $cart[$articulos->id]->cantidad=$cantidad;
      }
      return redirect()->route('cart-show'); 
    }

    public function delete($id)
    {
      $articulos=Articulo::find($id);
      $cart= \Session::get('cart');
      unset($cart[$articulos->id]);
      \Session::put('cart', $cart);
      return redirect()->route('cart-show');
    }

}

//https://getbootstrap.com/docs/4.0/examples/checkout/