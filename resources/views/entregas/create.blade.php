@extends('layouts.app')
@section('content')
<main class="main_reg">
    <div class="main_reg card titulo bienvenidos">
        <div class="container">
            <h2>Sube aquí tu archivo</h2>
        </div>
    </div>      
    <div class="container tareas p-3 p-md-5">
        <div class="form amarillo card text-black mb-3 tarea  mx-auto container" >
          <form action="{{ route('entrega.store') }}" method="POST" enctype="multipart/form-data" class="text-center">
            @csrf
            <input type="text" class="d-none" name="tarea_id" value="{{ $tarea->id }}">
            <input type="file" name="file">
            <br>
            <button type="submit" class="btn btn-w  mt-3">Guardar</button>
        </form>
    </div>
</div>    
</main> 
@endsection
