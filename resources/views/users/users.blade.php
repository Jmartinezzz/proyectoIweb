@if (Auth::user()->tipo == 2)
  <script>window.location="/productos";</script>
@endif
 @extends('main')

 @section('title')
 Usuarios
 @endsection

 @section('content')
  <div class="mt-5">
  	<h1>Lista de Usuarios</h1>
    @if(session()->get('message') == 'usuarioAgregado')
     <p class="alert alert-success alert-dismissible">
      <strong>¡Éxito!</strong>, Usuario agregado correctamente.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </p>
    @elseif(session()->get('message') == 'usuarioEliminado')
     <p class="alert alert-success alert-dismissible">
      <strong>¡Éxito!</strong>, Usuario eliminado correctamente.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </p>
    @elseif(session()->get('message') == 'usuarioModificado')
     <p class="alert alert-success alert-dismissible">
      <strong>¡Éxito!</strong>, Usuario modificado correctamente.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </p>
     @endif 
  	<div class="row mt-3">
  		<div class="col-md-6">
  			<a href="{{ url('usuarios/nuevo') }}" class="btn btn-primary" title="Nuevo Usuario">Nuevo Usuario</a>
  		</div>
  	</div>
  	<table class="table table-hover mt-2">
  		<tr>
  			<th>ID Usuario</th>
  			<th>User</th>
        <th>Correo</th>
  			<th>Fecha creación</th>
        <th>Tipo</th>
        <th>Acciones</th>          			
  		</tr>
  		@forelse($usuarios as $usuario)
  		<tr>
  			<td>{{$usuario->id}}</td>
  			<td>{{ ucwords($usuario->name) }}</td>
        <td>{{ $usuario->email }}</td>              
        <td>{{ $usuario->created_at->format('M-d-Y, h:i:s A') }}</td>  		
        <td>{!! ($usuario->tipo == 1)?'<span class="badge badge-pill badge-info">Administrador</span>':'<span class="badge badge-pill badge-success">Vendedor</span>'  !!}</td>	
  			<td>
          <a href="usuarios/editar/{{ $usuario->id }}" class="btn btn-warning btn-sm" title="Modificar"><span class="icon-pencil2"></span></a>
          <form style="display: inline;" action="usuarios/borrar/{{ $usuario->id }}" method="POST">
            {{ method_field('POST') }}
            {{ csrf_field() }}
            <button type="button" class="btn btn-danger btn-sm btn-eliminar" title="Eliminar"><span class="icon-trash"></span></button>    
          </form>
          
        </td>
  		</tr>
  		@empty
  		<tr>
  			<td colspan="6">No hay usuarios para mostrar</td>
  		</tr>
  		@endforelse
  	</table>
    <div class="row justify-content-center">
      <div class="col-3">
        {{ $usuarios->links('pagination::bootstrap-4') }}
      </div>      
    </div>
  </div>
 @endsection

 @section('scriptsFooter')
  <script>
    $('.btn-eliminar').on('click', function(e){
      if (confirm('Está seguro de eliminar este usuario?')){
        $(this).parents('form:first').submit();
      }
    })
  </script>
 @endsection
