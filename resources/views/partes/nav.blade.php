<nav class="navbar navbar-expand-lg navbar-dark bg-secondary fixed-top">
  <a class="navbar-brand text-white">    
    <img src="{{ asset('img/ico.png') }}" class="img-fluid" style="width: 30px" title="MiniMarket">
    MiniMarket
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse text-white" id="navbarSupportedContent">
    @if(Auth::user())
    <ul class="navbar-nav ml-auto">
      @if(Auth::user()->tipo == 1)
      <li class="nav-item">            
        <a class="nav-link {{ Request::path() == 'usuarios' || Request::path() == 'usuarios/nuevo' ? 'active' : '' }}" href="{{ url('usuarios') }}">Usuarios <span class="sr-only">(current)</span></a>        
      </li>
       <li class="nav-item">            
        <a class="nav-link {{ Request::path() == 'proveedores' || Request::path() == 'proveedores/nuevo' ? 'active' : '' }}" href="{{ url('proveedores') }}">Proveedores <span class="sr-only">(current)</span></a>        
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::path() == 'clientes' || Request::path() == 'clientes/nuevo' ? 'active' : '' }}" href="{{ url('clientes') }}">Clientes <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::path() == 'empleados' || Request::path() == 'empleados/nuevo' ? 'active' : '' }}" href="{{ url('empleados') }}">Empleados <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::path() == 'categorias' || Request::path() == 'categorias/nueva' ? 'active' : '' }}" href="{{ url('categorias') }}">Categorias <span class="sr-only">(current)</span></a>
      </li>
      @endif   
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle {{ Request::path() == 'productos/ventas' || Request::path() == 'productos/ventas' || Request::path() == 'productos/entradas' || Request::path() == 'productos' || Request::path() == 'productos/nuevo' ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          productos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ url('productos') }}">Lista</a>
          <a class="dropdown-item" href="{{ url('productos/entradas') }}">Entradas</a>
          <a class="dropdown-item" href="{{ url('productos/ventas') }}">Venta</a>
          <a class="dropdown-item" href="{{ url('productos/ordenes') }}">Ordenes</a>
        </div>
      </li>        
      <li class="nav-item dropdown mr-5">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}"><span class="icon-log-out"></span> Salir</a>
        </div>
      </li>
       
    </ul>
    @endif
  </div>
</nav>
  
