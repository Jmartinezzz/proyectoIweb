@extends('main')
@section('title', 'cambiar contraseña')
@section('user', 'active')
@section('userCambiarContra', 'active')

@section('content')
<div class="container">
    <div class="row mt-5 pt-3">
        <div class="col-md-8 col-md-offset-2">
            <p class="h1"><small>Cambiar Contraseña</small></p>
            <div class="panel-body">
			@if($errors->any())
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<h4 class="alert-heading">¡Verifica los siguientes campos!</h4>
			  	<ul>
				    @foreach ($errors->all() as $error)
				        <li>{{ $error }}</li>
				    @endforeach
				</ul>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			@endif
			@if(session()->get('paraContra') == 'contraMala')
		    <div class="alert alert-danger alert-dismissible fade show" role="alert">
		      <h4 class="alert-heading">¡Verifica los siguientes campos!</h4>
		      <li>Contraseña Actual Erronea</li>
		      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		      <span aria-hidden="true">&times;</span>
		      </button>
		    </div>
		    @endif
                <form action="{{ url('/usuarios/cambiar_contrasena') }}" method="POST">
                	{{ csrf_field() }} 
                	<div class="form-group">
                		<label for="contrasena_actual" class="">Contraseña Actual:</label>
                		<input class="form-control" type="password" name="contrasena_actual" id="contrasena_actual">
                	</div>
                	<div class="form-group">
                		<label for="contrasena_nueva" class="">Contraseña Nueva:</label>
                		<input class="form-control" type="password" name="contrasena_nueva" id="contrasena_nueva">
                	</div>
                	<div class="form-group">
                		<label for="contrasena_nueva_repetida" class="">Contraseña Nueva (repita):</label>
                		<input class="form-control" type="password" name="contrasena_nueva_repetida" id="contrasena_nueva_repetida">
                	</div>
                	
                	<div>
                		<input type="submit" class="btn btn-primary" value="Cambiar">
                		<a href="{{ route('cuenta', Auth::user()->id) }}" class="btn btn-dark text-white">cancelar</a>
                	</div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection