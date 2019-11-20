@if (Auth::user()->tipo == 2)
  <script>window.location="/productos";</script>
@endif
 @extends('main')

 @section('title')
 Editar Usuario
 @endsection

@section('content')
<div class="container">
    <div class="row mt-5 pt-3">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="h1">Editar usuario</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ url('/usuarios/modificar/' . $usuario->id) }}">
                        {{ csrf_field() }} 

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Usuario:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $usuario->name }}" readonly>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $usuario->email }}" readonly>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                    
                        <div class="form-group">
                            <label for="tipo" class="col-md-4 control-label">Tipo:</label>

                            <div class="col-md-6">
                                <select class="form-control" name="tipo" id="tipo">
                                    @if ($usuario->tipo == 1)
                                        <option value="1" selected="true">Administrador</option>
                                        <option value="2">Vendedor</option>
                                    @else
                                        <option value="1">Administrador</option>
                                        <option value="2" selected="true">Vendedor</option>
                                    @endif                                                                    
                                </select>
                            </div>
                        </div>

                        <div class="form-group pt-5">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Modificar
                                </button>
                                <a href="{{ url('usuarios') }}" class="btn btn-dark text-white"> Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
