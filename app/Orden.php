<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table='ordenes';
    protected $primaryKey="id";

    public $timestamps=false;

    protected $fillable =[
    	'user',
    	'total',
    ];

    protected $guarded =[
    	
    ];
}
