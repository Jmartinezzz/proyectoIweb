 @extends('main')

 @section('title')
 Nuevo producto
 @endsection

 @section('content')
  <div class="mt-5">
  	<h1>Nuevo Producto</h1>
    @foreach($errors->all() as $error)
      <p class="alert alert-danger alert-dismissible">{{ $error }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button></p>
    @endforeach
  	 <form action="guardar" method="POST">
      <input type="hidden" name="_method" value="POST">      
      {{  csrf_field() }}
      <div class="row">
        <div class="col-8">
          <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="" class="form-control">
          </div>
        </div>
      </div>
       <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label for="precioU">Precio Unitario:</label>
            <input type="text" id="precioU" name="precioU" class="form-control">
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <label for="cantidad">Cantidad:</label>
            <input type="text" id="cantidad" name="cantidad" class="form-control">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label for="precioU">Proveedor:</label>
            <select name="proveedor" id="proveedor" class="form-control">
              <option value="">-------Seleccione------</option>
              @foreach($proveedores as $prov)
              <option value="{{ $prov->SupplierID }}">{{ $prov->CompanyName }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <label for="cantidad">Categoria:</label>
            <select name="categoria" id="categoria" class="form-control">
              <option value="">-------Seleccione------</option>
              @foreach($categorias as $cat)
                <option value="{{ $cat->CategoryID }}">{{ $cat->CategoryName }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="row mt-2">
        <div class="col-5">
          <div class="form-group">
            <input class="btn btn-primary mr-1" type="submit" value="Guardar">
            <a href="{{ url('productos') }}" class="btn btn-dark text-white"> Cancelar</a>
          </div>
        </div>
        
      </div>
    </form>
 @endsection
