<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    public function user(){
		return $this->belongsTo('App\User');
	}
	public function tarea(){
		return $this->belongsTo('App\Tarea');
	}
}
