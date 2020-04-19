@extends('layouts.app')

@section('content')
{{--  --}}
<main class="main_sesion container">
  <div class="card titulo bienvenidos">
    <div class="container haztucuenta">
    </div>
  </div>      
  <!-- form -->
  @if (session('status'))
  <div class="alert alert-success" role="alert">
    <p class="text-center">Revisa el link que ha sido enviado a tu correo </p>
  </div>
  @endif
  <div class="card text-black mb-3 tarea rojo mx-auto form" >

   <form method="POST" action="{{ route('password.email') }}">
     @csrf

     <div class="form-group">
       <label for="email">Email</label><br>  
       <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

       @error('email')
       <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
       </span>
       @enderror
     </div>
     <button type="submit" class="btn btn-w">
           Enviar
      </button>

     
   </form>

 </div>



</main>
@endsection
