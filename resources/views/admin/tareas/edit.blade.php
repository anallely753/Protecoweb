@extends('layouts.admin')
@section('content')
<main class="main_regT container">
	<div class="card titulo bienvenidos">
		<div class="container">
			<h2>Edita tu tarea</h2>
		</div>
	</div>	
	<!-- form -->
	<div class="form card text-black mb-3 tarea verde mx-auto container p-3">
		<form class="text-white" method="POST" enctype="multipart/form-data" action="{{ route('admintareas.update',$tarea->id) }}">
			@csrf
			@method('PATCH')
			<div class="form-group">
				<label for="formGroupExampleInput">Título</label>
				<input value="{{ $tarea->titulo }}" type="text" class="form-control" id="formGroupExampleInput" name="titulo">
			</div>
			<div class="form-group">
				<label for="exampleFormControlTextarea1">Descripción</label>
				<textarea  class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcion">{{ $tarea->descripcion }}</textarea>
			</div>
			<div class="form-group">
				<label for="formGroupExampleInput">Tipo de archivo permitido</label>
				<input value="{{ $tarea->tipo_arch }}" type="text" class="form-control" id="formGroupExampleInput" name="tipo_arch">
			</div>
			<div class="form-group">
				<label for="formGroupExampleInput">Fecha de Entrega</label><br>
				<label for="">Día: </label>
				<input type="date" id="meeting-time"
				name="date" value="{{ $tarea->date }}"
				min="2020-03-26" max="202-08-01">
			</div>
			<div class="form-group">
				<label for="formGroupExampleInput">Hora: </label>
				<input type="time" id="meeting-time"
				name="time" value="{{ $tarea->time }}">
			</div>
			@if(! $tarea->file==NULL)
			<div class="form-group">
				<label for="formGroupExampleInput">Archivo Actual: </label>
				<a target="_blank" href="{{ asset("tareas/$tarea->file") }}" class="text-white">{{ $tarea->file }}</a>
			</div>
			<div class="form-group">
				<label for="formGroupExampleInput">Modificar Archivo:</label>
				<input  type="file" name="file" enctype  >
			</div>
			@else
			<div class="form-group">
				<label for="formGroupExampleInput">Subir Archivo:</label>
				<input  type="file" name="file" enctype  >
			</div>
			@endif

			<br>
			<button type="submit" class="btn bg-white">Enviar</button>
		</form>
	</div>



</main>
@endsection