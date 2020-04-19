@extends('layouts.app')

@section('content')
<main class="main_index">
  <div class="card titulo bienvenidos">
    <div class="container">
      <h2>Curso Desarrollo Web</h2>
      <h3 class="d-none d-sm-block">Material de Apoyo</h3>
   </div>

 </div>      
<div class="container tareas">
  <div class="card text-black mb-3 tarea amarillo" >
    <div class="card-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-6 text-left">
            <h3 class="card-title"></h3>
          </div>
          <div class="col-12 col-sm-3 text-left">
            <h6>Fecha de Entrega: <b>{{ $tarea->date }}</b> 
             <h6>A las: <b>{{ $tarea->time }}</b> hrs.</h6>
           </div>
           <div class="col-12 col-sm-3 text-left text-md-right">
            <a href="{{ route('entrega.show', $tarea->id) }}">
              <button type="button" class="btn bg-light" data-toggle="modal" data-target="#exampleModalCenter">
                Subir archivo
              </button>

            </a>
          </div>

        </div>
      </div>
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
    <span class="d-none">{{ $n++ }}</span>
  </div>
</div>

</main> 
@endsection
