@if (Auth::user()->tipo == 2)
  <script>window.location="/productos";</script>
@endif
@extends('main')

@section('title', 'Cuenta: ' . Auth::user()->name)

@section('content')
<div class="container">
    <div class="row mt-5 pt-3">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div><p class="h1">Bienvenido {{ Auth::user()->name }}<small> - Tu información</small></p></div>
                <div class="panel-body">
				@if ($errors->any())
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
                    <form action="{{ url('/usuarios/modificar/' . $usuario->id) }}" method="POST">
                    	{{ csrf_field() }} 
                    	<div class="form-group">
                    		<label for="user" class="">Usuario:</label>
                    		<input class="form-control" type="text" name="user" id="user" value="{{ old('user', $usuario->name) }}">
                    	</div>
                    	<div class="form-group">
                    		<label for="correo" class="">Correo:</label>
                    		<input class="form-control" type="email" name="correo" id="correo" value="{{ old('correo', $usuario->email) }}">
                    	</div>
                    	<div class="form-group">
                    		<label for="tipo" class="">Tipo:</label>
                    		<select name="tipo" id="tipo" class="form-control">
                    			<option value="1" {{ $usuario->tipo == 1? 'selected':'' }}>Administrador</option>
                    			<option value="2" {{ $usuario->tipo == 2? 'selected' :'' }}>Vendedor</option>
                    		</select>
                    	</div>
                    	
                    	<div class="form-group">
                    		<label class="text-secondary">Creación: {{ $usuario->created_at }}</label>
                    		
                    	</div>
                    	<div class="">
                    		<input type="submit" class="btn btn-primary" value="Modificar">
                    		<button class="btn btn-dark">cancelar</button>
                    	</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection