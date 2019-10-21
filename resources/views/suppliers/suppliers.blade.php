@if (Auth::user()->tipo == 2)
  <script>window.location="/productos";</script>
@endif
 @extends('main')

 @section('title')
 Proveedores
 @endsection

 @section('content')
  <div class="mt-5">
  	<h1>Lista de Proveedores</h1>
    @if(session()->get('message') == 'proveedorRegistrado')
     <p class="alert alert-success alert-dismissible">
      <strong>¡Éxito!</strong>, Proveedor agregado correctamente.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </p>
    @elseif(session()->get('message') == 'proveedorEliminado')
     <p class="alert alert-success alert-dismissible">
      <strong>¡Éxito!</strong>, Proveedor eliminado correctamente.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </p>
    @elseif(session()->get('message') == 'proveedorModificado')
     <p class="alert alert-success alert-dismissible">
      <strong>¡Éxito!</strong>, Proveedor modificado correctamente.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </p>
     @endif 
  	<div class="row mt-3">
  		<div class="col-md-6">
  			<a href="{{ url('proveedores/nuevo') }}" class="btn btn-primary" title="Nuevo Empleado">Nuevo Proveedor</a>
  		</div>
  	</div>
  	<table class="table table-hover mt-2">
  		<tr>
  			<th>ID Proveedor</th>
  			<th>Nombre empresa</th>
        <th>Nombre Contacto</th>
  			<th>Dirección</th>
        <th>Telefono</th>        
  			<th>Acciones</th>
  		</tr>
  		@forelse($proveedores as $proveedor)
  		<tr>
  			<td>{{$proveedor->SupplierID}}</td>
        <td>{{ ucwords($proveedor->CompanyName) }}</td>
  			<td>{{ ucwords($proveedor->ContactName) }}</td>        
        <td>{{ ucwords($proveedor->Address) }}</td>        
        <td>{{$proveedor->Phone}}</td>  			
  			<td>
          <a href="proveedores/editar/{{ $proveedor->SupplierID }}" class="btn btn-warning btn-sm" title="Modificar"><span class="icon-pencil2"></span></a>
          <form style="display: inline;" action="proveedores/borrar/{{ $proveedor->SupplierID }}" method="POST">
            {{ method_field('POST') }}
            {{ csrf_field() }}
            <button type="button" class="btn btn-danger btn-sm btn-eliminar" title="Eliminar"><span class="icon-trash"></span></button>    
          </form>
          
        </td>
  		</tr>
  		@empty
  		<tr>
  			<td colspan="5">No hay proveedores para mostrar</td>
  		</tr>
  		@endforelse
  	</table>
    <div class="row justify-content-center">
      <div class="col-3">
        {{ $proveedores->links('pagination::bootstrap-4') }}
      </div>      
    </div>
  </div>
 @endsection

 @section('scriptsFooter')
  <script>
    $('.btn-eliminar').on('click', function(e){
      if (confirm('Está seguro de eliminar este proveedor?')){
        $(this).parents('form:first').submit();
      }
    })
  </script>
 @endsection
