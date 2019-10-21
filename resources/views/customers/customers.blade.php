@if (Auth::user()->tipo == 2)
  <script>window.location="/productos";</script>
@endif
 @extends('main')

 @section('title')
 Clientes
 @endsection

 @section('content')
  <div class="mt-5">
  	<h1>Lista de Clientes</h1>
    @if(session()->get('message') == 'clienteRegistrado')
     <p class="alert alert-success alert-dismissible">
      <strong>¡Éxito!</strong>, Cliente agregado correctamente.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </p>
     @elseif(session()->get('message') == 'clienteEliminado')
     <p class="alert alert-success alert-dismissible">
      <strong>¡Éxito!</strong>, Cliente eliminada correctamente.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </p>
    @elseif(session()->get('message') == 'clienteModificado')
     <p class="alert alert-success alert-dismissible">
      <strong>¡Éxito!</strong>, Cliente modificado correctamente.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </p>     
     @endif 
  	<div class="row mt-3">
  		<div class="col-md-6">
  			<a href="{{ url('clientes/nuevo') }}" class="btn btn-primary" title="Nuevo Cliente">Nuevo Cliente</a >
  		</div>
  	</div>
  	<table class="table table-hover mt-2">
  		<tr>
  			<th>ID Cliente</th>
  			<th>Empresa</th>
  			<th>Contacto</th>
  			<th>Dirección</th>
        <th>Telefono</th>
        <th>Acciones</th>
  		</tr>
  		@forelse($clientes as $cliente)
  		<tr>
  			<td>{{$cliente->CustomerID}}</td>
  			<td>{{ ucwords($cliente->CompanyName) }}</td>
  			<td>{{ ucwords($cliente->ContactName) }}</td>
        <td>{{ ucwords($cliente->Address) }}</td>
        <td>{{ $cliente->Phone }}</td>
  			<td>
          <a href="clientes/editar/{{ $cliente->CustomerID }}" class="btn btn-warning btn-sm" title="Modificar"><span class="icon-pencil2"></span></a>
          <form style="display: inline;" action="clientes/borrar/{{ $cliente->CustomerID }}" method="POST">
            {{ method_field('POST') }}
            {{ csrf_field() }}
            <button type="button" class="btn btn-danger btn-sm btn-eliminar" title="Eliminar"><span class="icon-trash"></span></button>    
          </form>
        </td>
  		</tr>
  		@empty
  		<tr>
  			<td colspan="6" class="text-center">No hay clientes para mostrar</td>
  		</tr>
  		@endforelse
  	</table>
    <div class="row justify-content-center">
      <div class="col-3">
        {{ $clientes->links('pagination::bootstrap-4') }}
      </div>      
    </div>
  </div>
 @endsection

  @section('scriptsFooter')
  <script>
    $('.btn-eliminar').on('click', function(e){
      if (confirm('¿Está seguro de borrar este registro?')){
        $(this).parents('form:first').submit();
      }
    })
  </script>
 @endsection
