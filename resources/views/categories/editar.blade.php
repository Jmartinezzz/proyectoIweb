@if (Auth::user()->tipo == 2)
  <script>window.location="/productos";</script>
@endif
 @extends('main')

 @section('title')
 Editar Categoria
 @endsection

 @section('content')
  <div class="mt-5">
  	<h1 class="pt-2">Editar Categoria</h1>
  	@foreach($errors->all() as $error)
      <p class="alert alert-danger alert-dismissible">{{ $error }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button></p>
    @endforeach
    <form action="/categorias/modificar/{{ $categoria->CategoryID }}" method="POST">
      <input type="hidden" name="_method" value="POST">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="row">
        <div class="col-5">
          <div class="form-group">
            <label for="categoria">Nombre de la categoria:</label>
            <input type="text" id="categoria" name="categoria" class="form-control" value="{{ $categoria->CategoryName }}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-5">
          <div class="form-group">
            <label for="descripcion">Descripción de la categoria:</label>
            <textarea name="descripcion" id="descripcion" rows="3" style="width: 100%">{{ $categoria->Description }}</textarea>
          </div>
        </div>
      </div>
      <div class="row mt-2">
        <div class="col-5">
          <div class="form-group">
            <input class="btn btn-primary mr-1" type="submit" value="Modificar">
            <a href="{{ url('categorias') }}" class="btn btn-dark text-white"> Cancelar</a>
          </div>
        </div>
        
      </div>
    </form>

  </div>

 @endsection
