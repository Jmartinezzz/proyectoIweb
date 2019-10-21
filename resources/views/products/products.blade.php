 @extends('main')

 @section('title')
 Productos
 @endsection

 @section('content')
  <div class="mt-5">
  	<h1>Lista de Productos</h1>
    @if(session()->get('message') == 'productoRegistrado')
     <p class="alert alert-success alert-dismissible">
      <strong>¡Éxito!</strong>, Producto agregado correctamente.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </p>
    @elseif(session()->get('message') == 'productoEliminado')
     <p class="alert alert-success alert-dismissible">
      <strong>¡Éxito!</strong>, Producto eliminado correctamente.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </p>
    @elseif(session()->get('message') == 'productoModificado')
     <p class="alert alert-success alert-dismissible">
      <strong>¡Éxito!</strong>, Producto modificado correctamente.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </p>
     @endif 
  	<div class="row mt-3">
  		<div class="col-md-6">
  			<a href="{{ url('productos/nuevo') }}" class="btn btn-primary" title="Nuevo Empleado">Nuevo Producto</a>
  		</div>     
  	</div>
  	<table class="table table-hover mt-2">
  		<tr>
  			<th>ID Producto</th>
  			<th>Nombre</th>
        <th>Proveedor</th>
  			<th>Categoria</th>
        <th>Precio</th>
        <th>Existencias</th>
  			<th>Acciones</th>
  		</tr>
  		@forelse($productos as $producto)
  		<tr>
  			<td>{{$producto->ProductID}}</td>
  			<td>{{ ucwords($producto->ProductName) }}</td>
        <td>{{ ucwords($producto->CompanyName) }}</td>
        <td>{{ ucwords($producto->CategoryName) }}</td>
        <td>{{$producto->UnitPrice}}</td>
        <td>{{$producto->UnitsInStock}}</td>  			
  			<td>
          <a href="productos/editar/{{ $producto->ProductID }}" class="btn btn-warning btn-sm" title="Modificar"><span class="icon-pencil2"></span></a>
          <form style="display: inline;" action="productos/borrar/{{ $producto->ProductID }}" method="POST">
            {{ method_field('POST') }}
            {{ csrf_field() }}
            <button type="button" class="btn btn-danger btn-sm btn-eliminar" title="Eliminar"><span class="icon-trash"></span></button>    
          </form>
          
        </td>
  		</tr>
  		@empty
  		<tr>
  			<td colspan="5">No hay productos para mostrar</td>
  		</tr>
  		@endforelse
  	</table>
    <div class="row justify-content-center">
      <div class="col-3">
        {{ $productos->links('pagination::bootstrap-4') }}
      </div>      
    </div>
  </div>
 @endsection

 @section('scriptsFooter')
  <script>
    $('.btn-eliminar').on('click', function(e){
      if (confirm('Está seguro de eliminar este producto?')){
        $(this).parents('form:first').submit();
      }
    })
  </script>
 @endsection
