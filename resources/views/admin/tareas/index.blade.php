@extends('layouts.admin')
@section('content')
<main class="main_index">
  <div class="card titulo bienvenidos">
    <div class="container">
      <h2 class="text-left d-inline-block">Tareas</h2>
      <a href="{{ route('admintareas.create') }}">
        <button type="button" class="btn btn-success float-right">Agregar Tarea</button>
      </a>
    </div>
  </div><br>  
  <div class="container tareas tareas-admin">
    @foreach($tareas as $tarea)
      @if($n>3)
      <span class="d-none">{{ $n=0 }}</span>
      @endif
    <span class="d-none"> {{ $a=$num[$n] }}</span>
    <div class="card text-black mb-3 tarea {{ $colores[$a] }}" >
        <div class="card-header">
            <h2 class="card-title d-inline ">{{ $tarea->titulo }}</h2>
            <form action="{{ route('admintareas.destroy', $tarea->id) }}" method="POST" >
              <a href="{{ route('admintareas.show', $tarea->id) }}"><button type="button" class="btn btn-light float-right">Ver</button></a>
              <a href="{{ route('admintareas.edit', $tarea->id) }}"><button type="button" class="btn btn-light float-right">Editar</button></a>
              @csrf
              @method('DELETE')
              <a><button type="submit" class="btn btn-light float-right">Eliminar</button></a>
            </form>
            <h6 >Fecha de Entrega: <b>{{ $tarea->date }}</b> a las: <b>{{ $tarea->time }}</b></h6>
        </div>
        <div class="card-body">
            <h6><b> Descripción:</b></h6>
            <p class="card-text">{{ $tarea->descripcion }}</p>
            <p><b>  Tipo de archivo permitido: </b><span>{{ $tarea->tipo_arch }}</span></p>
            @if(! $tarea->file==NULL)
            <p class="d-inline"> <b> Archivo auxiliar: </b></p>
            @endif
            <a target="_blank" href="{{ asset("tareas/$tarea->file") }}"class="text-body">{{ $tarea->file }}</a>
        </div>
    </div>
    
    <span class="d-none">{{ $n++ }}</span>

    @endforeach
  </div>
</main> 
@endsection