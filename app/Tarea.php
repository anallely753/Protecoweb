<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    public function entregas(){
        return $this->hasMany('App\Entrega');
    }
}
