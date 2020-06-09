<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
	public function index(){
		return view('welcome');
	}
    public function store(Request $request){
    	\Stripe\Stripe::setApiKey("sk_test_51Gqm4ICBKZMkd2pere4vwI0Hs1aU6QNyLma9GbGF1Gu8OuVIQncATooU8V6CgkuzmG0EOYjL10Ro4TK8R8Bdd1lw00obwnxIQS");
    	$token = $_POST['stripeToken'];
    	$charge = \Stripe\Charge::create([
    		'amount' => 10000,
    		'currency' => 'usd',
    		'description' => 'Example charge',
    		'source' => $token,
    	]);
    	return app()->call('App\Http\Controllers\OrdenController@finalizar');
    }
}
