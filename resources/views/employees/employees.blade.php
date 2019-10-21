@if (Auth::user()->tipo == 2)
  <script>window.location="/productos";</script>
@endif
 @extends('main')

 @section('title')
 Empleados
 @endsection

 @section('content')
  <div class="mt-5">
  	<h1>Lista de Empleados</h1>
    @if(session()->get('message') == 'empleadoRegistrado')
     <p class="alert alert-success alert-dismissible">
      <strong>¡Éxito!</strong>, Empleado agregado correctamente.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
     @elseif(session()->get('message') == 'empleadoEliminado')
     <p class="alert alert-success alert-dismissible">
      <strong>¡Éxito!</strong>, Empleado eliminado correctamente.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </p>
     @elseif(session()->get('message') == 'empleadoModificado')
     <p class="alert alert-success alert-dismissible">
      <strong>¡Éxito!</strong>, Empleado modificado correctamente.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </p>
     @endif 
  	<div class="row mt-3">
  		<div class="col-md-6">
  			<a href="{{ url('empleados/nuevo') }}" class="btn btn-primary" title="Nuevo Empleado">Nuevo Empleado</a>
  		</div>
  	</div>
  	<table class="table table-hover mt-2">
  		<tr>
  			<th>ID Empleado</th>
  			<th>Nombre</th>
        <th>Apellido</th>
  			<th>Dirección</th>
        <th>Telefono</th>
        <th>Fecha Nac.</th>
  			<th>Acciones</th>
  		</tr>
  		@forelse($empleados as $empleado)
  		<tr>
  			<td>{{$empleado->EmployeeID}}</td>
  			<td>{{ ucwords($empleado->FirstName) }}</td>
        <td>{{ ucwords($empleado->LastName) }}</td>
        <td>{{ ucwords($empleado->Address) }}</td>
        <td>{{$empleado->phone}}</td>
  			<td>{{ date_format(date_create($empleado->BirthDate),'d/m/Y') }}</td>
  			<td>
            <a href="empleados/editar/{{ $empleado->EmployeeID }}" class="btn btn-warning btn-sm" title="Modificar"><span class="icon-pencil2"></span></a>
          <form style="display: inline;" action="empleados/borrar/{{ $empleado->EmployeeID }}" method="POST">
            {{ method_field('POST') }}
            {{ csrf_field() }}
            <button type="button" class="btn btn-danger btn-sm btn-eliminar" title="Eliminar"><span class="icon-trash"></span></button>    
          </form>
        </td>
  		</tr>
  		@empty
  		<tr>
  			<td colspan="4">No hay empleados para mostrar</td>
  		</tr>
  		@endforelse
  	</table>
    <div class="row justify-content-center">
      <div class="col-3">
        {{ $empleados->links('pagination::bootstrap-4') }}
      </div>      
    </div>
  </div>
 @endsection

  @section('scriptsFooter')
  <script>
    $('.btn-eliminar').on('click', function(e){
      if (confirm('Está seguro de eliminar este empleado?')){
        $(this).parents('form:first').submit();
      }
    })
  </script>
 @endsection
