@extends('layouts.app')

@section('content')
<main class="main_index">
  <div class="card titulo bienvenidos">
    <div class="container">
      <h1 class="d-none d-sm-block">Bienvenidos</h1>
      <h2>Curso Desarrollo Web</h2>
      <h3 class="d-none d-sm-block">Gen 40</h3>
      @if(Session::has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
       <h4>{{ Session::get('success') }}</h4>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     @endif
   </div>

 </div>      
 <div class="container tareas">
  <h4 class="p-2 d-none d-sm-block">Tareas pendientes:</h4>
  @foreach($tareas as $tarea)
  {{-- colores --}}
  @if($n>3)
  <span class="d-none">{{ $n=0 }}</span>
  @endif
  {{-- pendientes --}}
  <p class="d-none">{{ $bandera=0 }}</p>
  @foreach($entregas as $entrega)
  @if($entrega->tarea_id==$tarea->id)
  <p class="d-none">{{ $bandera=1 }}</p>
  @endif
  @endforeach
  @if($bandera==0)

  <span class="d-none"> {{ $a=$num[$n] }}</span>
  <div class="card text-black mb-3 tarea {{ $colores[$a] }}" >
    <div class="card-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-6 text-left">
            <h3 class="card-title">{{ $tarea->titulo }}</h3>
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
  @endif
  @endforeach
</main> 
@endsection
