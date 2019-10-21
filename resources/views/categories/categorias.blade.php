 @if (Auth::user()->tipo == 2)
  <script>window.location="/productos";</script>
@endif
 @extends('main')

 @section('title')
 Categorias
 @endsection

 @section('content')
  <div class="mt-5">
  	<h1>Lista de categorias para productos</h1>
    @if(session()->get('message') == 'categoriaRegistrada')
     <p class="alert alert-success alert-dismissible">
      <strong>¡Éxito!</strong>, Categoria agregada correctamente.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </p>
    @elseif(session()->get('message') == 'categoriaEliminada')
     <p class="alert alert-success alert-dismissible">
      <strong>¡Éxito!</strong>, Categoria eliminada correctamente.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </p>
    @elseif(session()->get('message') == 'categoriaModificada')
     <p class="alert alert-success alert-dismissible">
      <strong>¡Éxito!</strong>, Categoria modificada correctamente.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </p>
     @endif 
  	<div class="row mt-4 justify-content-between">
  		<div class="col-md-6">
  			<a href="{{ url('categorias/nueva') }}" class="btn btn-primary" title="Nueva Categoria">Nueva Categoria</a>
  		</div>
       <div class="col-md-4">
        <form action="categorias" class="form-inline float-right" method="GET">          
          <div class="form-row">
            <div class="col">
              <input type="text" class="form-control" name="np" placeholder="Busqueda por nombre">
            </div>
            <div class="col">
              <input type="submit" value="Buscar" class="btn btn-success">
            </div>
          </div>          
        </form>
      </div>
  	</div>
  	<table class="table table-hover mt-2">
  		<tr>
  			<th>ID Categoria</th>
  			<th>Nombre</th>
  			<th>Descripción</th>
  			<th>Acciones</th>
  		</tr>
  		@forelse($categorias as $categoria)
  		<tr>
  			<td>{{$categoria->CategoryID}}</td>
  			<td>{{ ucwords($categoria->CategoryName) }}</td>
  			<td>{{$categoria->Description}}</td>
  			<td>
          <a href="categorias/editar/{{ $categoria->CategoryID }}" class="btn btn-warning btn-sm" title="Modificar"><span class="icon-pencil2"></span></a>
           <form style="display: inline;" action="/categorias/borrar/{{ $categoria->CategoryID }}" method="POST">
            {{ method_field('POST') }}            
            {{ csrf_field() }}            
            <button type="button" class="btn btn-danger btn-sm btn-eliminar" title="Eliminar"><span class="icon-trash"></span></button>    
          </form>
        </td>
  		</tr>
  		@empty
  		<tr>
  			<td colspan="4" class="text-center">No hay categorias para mostrar</td>
  		</tr>
  		@endforelse
  	</table>
    <div class="row justify-content-center">
      <div class="col-3">
        {{ $categorias->links('pagination::bootstrap-4') }}
      </div>      
    </div>
  </div>
 @endsection

 @section('scriptsFooter')
  <script>
    $('.btn-eliminar').on('click', function(e){
      if (confirm('¿Está seguro de eliminar este registro?')){
        $(this).parents('form:first').submit();
      }
    })
  </script>
 @endsection
