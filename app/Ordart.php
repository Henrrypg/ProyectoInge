<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordart extends Model
{
    protected $table='ord-art';
    protected $primaryKey="id";

    public $timestamps=false;

    protected $fillable =[
    	'id_art',
    	'id_orden',
    	'cantidad'
    ];

    protected $guarded =[
    	
    ];
}
