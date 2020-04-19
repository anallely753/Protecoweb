@extends('layouts.admin')
@section('content')
<main class="main_regA">
	<div class="card titulo bienvenidos">
		<div class="container haztucuenta">
			<h3>Registra un usuario</h3>
		</div>
	</div>      
	<!-- form -->
	<div class="form azul card text-black mb-3 tarea  mx-auto container" >
		<form class="text-white" method="POST" action="{{ route('adminusuarios.store') }}">
			@csrf
			<div class="form-group">
				<label for="name">Nombre</label>
				<input type="text" class="form-control" name="name">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Email address</label>
				<input type="email" class="form-control" name="email" aria-describedby="emailHelp">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Contraseña</label>
				<input type="password" class="form-control" name="password">
			</div>
			<div class="form-group ml-3">
				<input class="form-check-input " type="checkbox" name="admin"  {{ old('name') ? 'checked="checked"' : '' }}>

				<label class="form-check-label" for="remember"><small>Admin</small></label>
			</div>
			<br>
			<button type="submit" class="btn btn-w">Registrar</button>
		</form>
	</div>
</main>
@endsection