@extends('layouts.admin')
@section('content')
<main>
	<div class="container">
		<br>
		<h1 class="text-left">Usuarios	<a href="{{ route('adminusuarios.create') }}">
			 <button type="button" class="btn btn-success float-right">Agregar Usuario</button>
		</a></h1>
		<br>
		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">Nombre</th>
		      <th scope="col">Email</th>
		      <th scope="col">Admin</th>
		      <th>Opciones</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($users as $user)
		    <tr>
		      <th scope="row">{{ $user->id }}</th>
		      <td>{{ $user->name }}</td>
		      <td>{{ $user->email }}</td>
		      <td>{{ $user->admin }}</td>		
		      <td>		      	      
		      	<form action="{{ route('adminusuarios.destroy', $user->id) }}" method="POST">
		      		<a href="{{ route('adminusuarios.show', $user->id) }}"><button type="button" class="btn btn-secondary bg-secondary">Ver</button></a>
		      		<a href="{{ route('adminusuarios.edit', $user->id) }}"><button type="button" class="btn btn-primary d-none d-sm-inline bg-primary">Editar</button></a>
		      		@csrf
		      		@method('DELETE')
		      		<button type="submit" class="btn btn-danger d-none d-sm-inline bg-danger">Eliminar</button>
		      	</form>
		      
		      </td>       
		    </tr>
		    @endforeach
		  </tbody>
		</table>
	</div>
</main>
@endsection