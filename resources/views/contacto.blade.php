@extends('layouts.app')
@section('content')
<main class="main_contacto">
	<div class="card titulo bienvenidos">
		<div class="container haztucuenta">
			<h3>Mandame un mensaje</h3>
		</div>
	</div>      
	<!-- form -->
	
	<div class="form azul card text-black mb-3 tarea  mx-auto container" >
		<form class="text-white" method="POST" action="{{ route('contactus.store') }}">
			@csrf
			<div class="form-group">
				<label for="name">Nombre: </label>
				<input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
				<input type="hidden" name="email" value="{{ Auth::user()->email }}">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Asunto: </label>
				<input type="text" class="form-control" name="subject" aria-describedby="emailHelp">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Mensaje: </label><br>
				<textarea name="message" id="" class="w-100" rows="5"></textarea>
			</div>
			<button type="submit" class="btn btn-w">Enviar</button>
		</form>
	</div>
</main>
@endsection