<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }

    public function admin(){
        return view('/categoria');
    }
    public function index(Request $request)
    {
        return view('categoria.adminindex');
    }
}
