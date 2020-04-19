@extends('layouts.app')
@section('content')
<main class="main_grades">
	<div class="card titulo bienvenidos">
		<div class="container">
			<h2>Calificaciones</h2>
		</div>
	</div> 
	<div class="container mt-2 mt-md-3 grades">
		<table class="table table-hover mx-auto">
			<thead>
				<tr class="amarillo">
					{{-- <th scope="col" class="mr-3">Id</th> --}}
					<th scope="col" class="mr-3">Tarea</th>
					<th scope="col" class="pl-md-5 mr-md-5">Calificación</th>
				</tr>
			</thead>
			<tbody>
				@foreach($entregas as $entrega)
				@if($entrega->grade>6)
				<p class="d-none">{{ $color="text-success" }}</p>	
				@endif
				
				@if($entrega->user->id==$user->id)
				@if(! $entrega->grade==NULL)
				<tr>
					{{-- <th scope="row">{{ $entrega->tarea_id }}</th> --}}
					<td class="pr-md-5 mr-md-5">{{ $entrega->tarea->titulo }}</td>
					<td class="text-center pl-md-5 mr-md-5 {{ $color }}"><b>{{ $entrega->grade }}</b></td>
				</tr>
				@endif
				@endif
				@endforeach
			</tbody>
		</table>
	</div>
	
	
	
</main>
@endsection