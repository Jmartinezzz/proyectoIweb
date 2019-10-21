 @extends('main')

 @section('title')
Entrada de producto
 @endsection

 @section('content')
  <div class="mt-5">
  	<h1>Nueva Entrada</h1>
    @foreach($errors->all() as $error)
      <p class="alert alert-danger alert-dismissible">{{ $error }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button></p>
    @endforeach
    @if(session()->get('message') == 'entradaRegistrado')
     <p class="alert alert-success alert-dismissible">
      <strong>¡Éxito!</strong>, Entrada agregada correctamente.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </p>
    @endif
  	<div class="row">
     <div class="col-4">
        <form action="guardaEntradas" method="POST">
      <input type="hidden" name="_method" value="POST">      
      {{  csrf_field() }}
      <div class="row">
        <div class="col-12">
          <div class="form-group">
            <label for="producto">Producto:</label>
            <select name="producto" class="form-control" id="producto">
              <option value="" selected="true">-----------Seleccione----------</option>
              @foreach ($productos as $producto)
                <option value="{{ $producto->ProductID }}">{!! $producto->ProductName . "      (" .$producto->UnitsInStock . ")" !!}</option>
              @endforeach
            </select>
          </div>
        </div>      
      </div>
      <div class="row">       
        <div class="col-12">
          <div class="form-group">
            <label for="cantidad">Cantidad Entrante:</label>
            <input type="text" id="cantidad" name="cantidad" class="form-control"  autofocus>
          </div>
        </div>
      </div>    
      <div class="row mt-5">
        <div class="col-12">
          <div class="form-group">
            <input class="btn btn-primary mr-1" type="submit" value="Agregar">
            <a href="{{ url('productos') }}" class="btn btn-dark text-white"> Cancelar</a>
          </div>
        </div>             
      </div>
    </form>
     </div>
     <div class="col-7 offset-1">
      <table class="table table-hover">
        <tr>
          <th>ID Entrada.</th>
          <th>Producto.</th>
          <th>Cantidad.</th>
        </tr>
       @foreach ($entradas as $entrada)
        <tr>
          <td>{{ $entrada->idEntrada }}</td>
          <td>{{ $entrada->ProductName }}</td>
          <td>{{ $entrada->cantidad }}</td>
        </tr>
       @endforeach
      </table>
       <div class="row justify-content-center">
      <div class="col-3">
        {{ $entradas->links('pagination::bootstrap-4') }}
      </div>      
    </div>
     </div>
    </div>
 @endsection
