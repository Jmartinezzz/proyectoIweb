@if (Auth::user()->tipo == 2)
  <script>window.location="/productos";</script>
@endif
 @extends('main')

 @section('title')
 Editar empleado
 @endsection

 @section('content')
  <div class="mt-5">
  	<h1>Editar Empleado</h1>
    @foreach($errors->all() as $error)
      <p class="alert alert-danger alert-dismissible">{{ $error }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button></p>
    @endforeach
  	 <form action="/empleados/modificar/{{ $empleado->EmployeeID }}" method="POST">
      <input type="hidden" name="_method" value="POST">      
      {{  csrf_field() }}
      <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ $empleado->FirstName }}" class="form-control">
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" value="{{ $empleado->LastName }}" class="form-control">
          </div>
        </div>
      </div>
       <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label for="fechaNac">Fecha de nacimiento:</label>
            <input type="date" id="fechaNac" name="fechaNac" value="{{ date('Y-m-d', strtotime($empleado->BirthDate)) }}" class="form-control">
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <label for="telefono">Telefono:</label>
            <input type="text" id="telefono" name="telefono" value="{{ $empleado->phone }}" class="form-control">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-8">
          <div class="form-group">
            <label for="direccion">Dirección:</label>
            <textarea name="direccion" id="direccion" rows="2" style="width: 100%">{{ $empleado->Address }}</textarea>
          </div>
        </div>
      </div>
      <div class="row mt-2">
        <div class="col-5">
          <div class="form-group">
            <input class="btn btn-primary mr-1" type="submit" value="Guardar">
            <a href="{{ url('empleados') }}" class="btn btn-dark text-white"> Cancelar</a>
          </div>
        </div>
        
      </div>
    </form>
 @endsection
