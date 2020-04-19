@extends('layouts.app')
@section('content')
<main>
	<div class="jumbotron jumb-usr">
		<div class="container amarillo text-center pt-1 pt-md-4">
			<img src="{{ asset("img/users/$user->img") }}" alt="" class="show-user">
			<br><br>
			<h2>{{ $user->name }}</h2>
			<h5>{{ $user->email }}</h5>
			<br>	
			<form class="pb-1 pb-md-4" action="{{ route('usuariosimg.update', $user->id) }}" method="POST"enctype="multipart/form-data">
				@method('PATCH')			        	
				@csrf
				@if($user->img==NULL)
				<label for="img"><h5 class="center-text text-danger">Sube una foto de perfil</h5></label>
				@else
				<label for="img"><h5 class="center-text text-danger">Edita tu foto de perfil</h5></label>
				@endif
				<br>
				<input accept="image/*" type="file" name="img">
				<br>	
				<button type="submit" class="btn-primary">Subir Foto</button>
			</form>
		</div>
	</div>
</main>
@endsection