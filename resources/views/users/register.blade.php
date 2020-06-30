@if (Auth::user()->tipo == 2)
  <script>window.location="/productos";</script>
@endif
 @extends('main')

 @section('title')
 Nuevo Usuario
 @endsection

@section('content')
<div class="container">
    <div class="row mt-5 pt-3">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="h1">Registro de usuarios</div>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                      <p class="alert alert-danger alert-dismissible">{{ $error }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button></p>
                    @endforeach
                @endif

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('guardar') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Usuario:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="user" value="{{ old('user') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="correo" value="{{ old('correo') }}" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password:</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Password:</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Tipo:</label>

                            <div class="col-md-6">
                                <select class="form-control" name="tipo" id="">
                                    <option value="1">Administrador</option>
                                    <option value="2">Vendedor</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
