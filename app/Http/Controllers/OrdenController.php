<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\articulo;
use App\Orden;
use App\Ordart;
use Illuminate\Support\Facades\Auth;
Use DB;


class OrdenController extends Controller
{
	public function __construct()
    {
      //$this->middleware('usuario');
      if(!\Session::has('cart')) \Session::put('cart',array());// si no existe la vaiable la crea y creo un array
    }

    public function index()
    {
        $ordenes=DB::table('ordenes')->where('user','LIKE', Auth::user()->id)
            ->orderBy('id','desc')
            ->paginate(7);
        $ordat=DB::table('ord-art')->orderBy('id','desc')
            ->paginate(7);
        $users=DB::table('users')
            ->orderBy('id','desc')
            ->paginate(7);
        $articulos=DB::table('articulos')->orderBy('id','desc')
            ->paginate(7);
        If(Auth::check()) {
            return view('ordenes.index',["ordenes"=>$ordenes,"users"=>$users, "ordat"=>$ordat, "articulos"=>$articulos]);
        }
    }

    

    public function finalizar(){
      
      If(Auth::check()){
      $cart= \Session::get('cart');

      $total=0;

      foreach ($cart as $item) {
        
          $total+=$item->precio * $item->cantidad;
      } 

      $orden = new  Orden();
      $orden->total = $total;
      $user = Auth::user();
      $orden->user=$user->id;
      $orden->save();


      foreach ($cart as $item) {
        $articulos=Articulo::find($item->id);
        $articulos->cantidad=$articulos->cantidad-$item->cantidad;
        $articulos->update();

        $ord = new Ordart();
        $ord->id_art = $item->id;
        $ord->id_orden = $orden->id;
        $ord->cantidad = $item->cantidad;
        $ord->save();
      }
      \Session::forget('cart');

      return redirect('/articulos')->with('alert', 'Compra satisfactoria!');
    }else{
      return redirect()->route('cart-show')->with('alert', 'Debe iniciar sesión!');
    }
    }
}
