@extends('layouts.admin')
@section('content')
<main>
	<div class="jumbotron jumb-usr">
		<div class="container amarillo p-3 text-center">
			<img src="{{ asset("img/users/$user->img") }}" alt="" class="show-user">
			<br><br>
			<h2>{{ $user->name }}</h2>
			<h5>{{ $user->email }}</h5>
		</div>
	</div>
</main>
@endsection