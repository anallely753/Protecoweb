@extends('layouts.app')

@section('content')
{{--  --}}
<main class="main_sesion container">
  <div class="card titulo bienvenidos">
    <div class="container haztucuenta">
      <h2 class="d-none d-md-block">Hola!</h2>
      <h3 >Inicia sesión</h3>
    </div>
  </div>      
  <!-- form -->
  <div class="card text-black mb-3 tarea amarillo mx-auto form" >
    <form class="text-dark" method="POST" action="{{ route('login') }}">
      @csrf
      <div class="form-group">
        <label for="exampleInputEmail1">Usuario</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Contraseña</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group ml-3">
       <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

       <label class="form-check-label" for="remember"><small>Recordar mis datos</small></label>
     </div>
     <button type="submit" class="btn">Enviar</button>
     <br>
     @if (Route::has('password.request'))
     <a href="{{ route('password.request') }}"><small class="text-white">¿Olvidaste tu contraseña?</small></a>
     @endif
   </form>
 </div>



</main>
@endsection
