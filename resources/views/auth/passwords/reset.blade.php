@extends('layouts.app')
@section('content')
{{--  --}}
<main class="main_sesion container">
  <div class="card titulo bienvenidos">
    <div class="container haztucuenta">
      <h3>Escribe tu nueva contraseña</h3>
    </div>
  </div>      
  <!-- form -->
  <div class="card text-black mb-3 tarea verde mx-auto form" >
   <form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="form-group row">
      <label for="email">Email</label>

      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

      @error('email')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror

    </div>
    <div class="form-group row">
      <label for="password">Nueva Contraseña:</label>

      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

      @error('password')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="form-group row">
      <label for="password-confirm">Confirmar Contraseña:</label>

      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
    <div class="form-group row">  
      <button type="submit" class="btn btn-w">
      Reestablecer contraseña    </button>

    </div>

  </form>
</div>
</main>
@endsection
