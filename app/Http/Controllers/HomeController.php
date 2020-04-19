<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Entrega;
use App\Tarea;
use App\User;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas = Tarea::all();

        // Para colores
         $num=array(0,1,2,3);
        $colores = array("azul", "rojo", "verde", "amarillo");
        $n=0;

        // Para pendientes
        $bandera=0;
        $id=Auth::user()->id;
        $entregas=Entrega::where('user_id', $id)->get();


        return view('home',['tareas'=>$tareas, 'colores'=>$colores, 'num'=>$num, 'colores'=>$colores, 'n'=>$n, 'entregas'=>$entregas, 'bandera'=>$bandera]);
    
    }
    public function show($id){

        $color="text-danger";
        $entregas = Entrega::all();
        return view('usuarios.show', ['user'=>User::findOrFail($id), 'entregas'=>$entregas, 'color'=>$color]);
    }
    public function grades($id){
        $color="text-danger";
        $entregas = Entrega::all();
        return view('usuarios.grades', ['user'=>User::findOrFail($id), 'entregas'=>$entregas, 'color'=>$color]);
    }
    public function material(){
        
        return view('material');
    }

    
}
