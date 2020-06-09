<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table='articulos';
    protected $primaryKey="id";

    public $timestamps=false;

    protected $fillable =[
    	'nombre',
    	'descripcion',
    	'precio',
    	'imagen',
    	'cantidad',
        'user',
        'rates'
    ];

    protected $guarded =[
    	
    ];
}
