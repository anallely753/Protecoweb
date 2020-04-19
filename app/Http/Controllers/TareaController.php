<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Entrega;
use App\Tarea;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas = Tarea::all();
        $num=array(0,1,2,3);
        $colores = array("azul", "rojo", "verde", "amarillo");
        $n=0;
        return view('admin.tareas.index',['tareas'=>$tareas, 'colores'=>$colores, 'num'=>$num, 'colores'=>$colores, 'n'=>$n]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tareas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarea=new Tarea();
        $tarea->titulo=request($key = 'titulo');
        $tarea->descripcion=request($key = 'descripcion');
        $tarea->date=request($key = 'date');
        $tarea->time=request($key = 'time');
        $tarea->tipo_arch=request($key = 'tipo_arch');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name=$file->getClientOriginalName();

            $destination = public_path() . '/tareas/';
            $file->move($destination, $name);
            $tarea->file=$name;
        }
        $tarea->save();
        return redirect('admintareas');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entregas=Entrega::all();
        return view('admin.tareas.show', ['tarea'=>Tarea::findOrFail($id), 'entregas'=>$entregas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       return view('admin.tareas.edit', ['tarea'=>Tarea::findOrFail($id)]);
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tarea=Tarea::findOrFail($id);
        $tarea->titulo=$request->get('titulo');
        $tarea->descripcion=$request->get('descripcion');
        $tarea->tipo_arch=$request->get('tipo_arch');
        $tarea->date=$request->get('date');
        $tarea->time=$request->get('time');

        if ($request->hasFile('file')) {
         $file = $request->file('file');
         $name=$file->getClientOriginalName();

         $destination = public_path() . '/tareas/';
         $file->move($destination, $name);
         $tarea->file=$name;
     }

     $tarea->update();
     return redirect('admintareas');

 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tareas=Tarea::findOrFail($id);
        $tareas->delete();
        return redirect('admintareas');
    }
}
