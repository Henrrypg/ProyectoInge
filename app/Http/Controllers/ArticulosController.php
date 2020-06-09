<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\articulo;
use App\Ordart;
use App\Http\Request\ArticulosFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use DB;

class ArticulosController extends Controller
{
	public function __construct()
    {
      

    }
    public function index(Request $request)
    {
        $query=trim($request->get('searchText'));
            $articulos=DB::table('articulos')->where('nombre','LIKE','%'.$query.'%')
            ->orderBy('estrellas','desc')
            ->paginate(7);
        $users=DB::table('users')
            ->orderBy('id','desc')
            ->paginate(7);
        If(Auth::check() && Auth::user()->isAdmin()) {
            return view('articulos.index',["articulos"=>$articulos,"searchText"=>$query,"users"=>$users]);
        }else{
            return view('articulos.user',["articulos"=>$articulos,"searchText"=>$query,"users"=>$users]);
        }
    }

    public function estrellas(string $id,int $orden, string $estrellas){
        $articulo=Articulo::findOrFail($id);
        $articulo->rates=$articulo->rates+1;
        $articulo->estrellas=($articulo->totalestrellas+$estrellas)/$articulo->rates;
        $articulo->totalestrellas=$articulo->totalestrellas+$estrellas;
        $articulo->update();
        $ord = Ordart::findOrFail($orden);
        $ord->puntua=1;
        $ord->update();


        return redirect('/articulos');
    }

    public function user(Request $request){
        $query=trim($request->get('searchText'));
            $articulos=DB::table('articulos')->where('nombre','LIKE','%'.$query.'%')
            ->where('user','LIKE', Auth::user()->id)
            ->orderBy('id','desc')
            ->paginate(7);
        $users=DB::table('users')
            ->orderBy('id','desc')
            ->paginate(7);
        If(Auth::check()) {
            return view('articulos.index',["articulos"=>$articulos,"searchText"=>$query,"users"=>$users]);
        }else{
            return view('articulos.user',["articulos"=>$articulos,"searchText"=>$query,"users"=>$users]);
        }
    }

    public function create()
    {
        If(Auth::check()) {
        $createe = DB::select('select nombre from categoria');
        return view('articulos.create',["categoria"=>$createe]);
        }
    }
    public function update(Request $request,$id)
    {
        $articulo=Articulo::findOrFail($id);
        if ($request->hasFile('imagen')) {
          $file=$request->file('imagen');
          $name=time().$file->getClientOriginalName();
          $file->move(public_path().'/images/', $name);
          $articulo->imagen=$name;
        }
        $articulo->nombre=$request->get('nombre');
        $articulo->descripcion=$request->get('descripcion');
        $articulo->cantidad=$request->get('cantidad');
        $articulo->precio=$request->get('precio');
        $articulo->categoria=$request->get('categoria');

        $articulo->update();
        return redirect('/articulos');
    }

    public function show($id)
    {
        $createe = DB::select('select nombre from categoria');
        return view("articulos.edit",["articulos"=>Articulo::findOrFail($id)],["categoria"=>$createe]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $articulo=new Articulo();
        if ($request->hasFile('imagen')) {
          $file=$request->file('imagen');
          $name=time().$file->getClientOriginalName();
          $file->move(public_path().'/images/', $name);
          $articulo->imagen=$name;
        }
        $articulo->nombre=$request->input('nombre');
        $articulo->descripcion=$request->input('descripcion');
        $articulo->precio=$request->input('precio');
        $articulo->cantidad=$request->input('cantidad');
        $articulo->categoria=$request->get('categoria');
        $articulo->user=$user->id;
        $articulo->save();
        return redirect('/articulos');
    }
    
    public function destroy($id)
    {
        Articulo::destroy($id);
        return redirect('/articulos');
    }
}
