@if (Auth::check())
	<script>window.location="productos";</script>
@endif
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
	<link rel="icon" type="image/png" href="{{ asset('img/ico.png') }}" />
  	<link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/pace.min.js') }}"></script>
	<script src="{{  asset('js/nicescroll.min.js') }}"></script>
	<style>
    .pace {
      -webkit-pointer-events: none;
      pointer-events: none;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    .pace-inactive {
      display: none;
    }

    .pace .pace-progress {
      background: #756D6D;
      position: fixed;
      z-index: 2000;
      top: 0;
      right: 100%;
      width: 100%;
      height: 3px;
    }
    </style>
</head>
<body background="{{ asset('img/fondo.jpg') }}">
	<main>
		<div class="container mt-5 pt-5">
			@foreach($errors->all() as $error)
      		<p class="alert alert-danger alert-dismissible">{{ $error }}
      		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
      		<span aria-hidden="true">&times;</span>
      		</button></p>
    		@endforeach
			<div class="row justify-content-center">
				<div class="col-4	">
					<div class="panel panel-default">
						<div class="panel-heading">							
							<p class="h1 panel-title"><span class="icon-login"></span> Login</p>
						</div>
						<div class="panel-body">
							<form method="POST" action="{{ route('login') }}">
								<input type="hidden" name="_method" value="POST">  
								{{ csrf_field() }}
								<div class="form-group">
									<label for="name"><span class="icon-user"></span> Usuario</label>
									<input class="form-control" type="text" id="name" name="name" placeholder="Ingrese su usuario" value="{{ old('name') }}" />									
								</div>
								<div class="form-group">
									<label for="password"><span class="icon-key"></span> Contraseña</label>
									<input class="form-control" type="password" id="password" name="password" placeholder="Ingrese su contraseña" />									
								</div>
								<button type="submit" class="btn btn-primary btn-block"><span class="icon-login"></span> Entrar</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
	
	
</body>
</html>