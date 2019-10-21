 @extends('main')

 @section('title')
 Ordenes
 @endsection

 @section('content')
  <div class="mt-5">
  	<h1>Historial de Ordenes</h1>
    @if(session()->get('message') == 'ordenRegistrada')
     <p class="alert alert-success alert-dismissible">
      <strong>¡Éxito!</strong>, Venta agregada correctamente.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </p>       
     @endif 
  	<div class="row mt-3">
  		<div class="col-md-6">
  			<a href="{{ url('/productos/ventas') }}" class="btn btn-primary" title="Nuevo Empleado">Nueva Venta</a>
  		</div>     
  	</div>
  	<table class="table table-hover mt-2">  		
      @php
        $id=0;
        $vuelta = 0;
      @endphp
  		@forelse($orders as $dato)       
      @if ($id != $dato->OrderID)
        @php $vuelta++; @endphp
        <tr class="bg-info">
          <th>ID Orden: {{ $dato->OrderID }}</th>
          <th>Cliente: {{ !empty($dato->CompanyName)?ucwords($dato->CompanyName):'Cliente' }}</th>
          <th>Total: {{ "$ ".number_format($dato->total,2) }}</th>
          <th class="text-right">{{ date_format(date_create($dato->OrderDate),'d/m/Y') }}</th>  
        </tr>
        <tr>        
          <td>Producto</td>
          <td>Cantidad</td>        
          <td>Precio</td>
          <td align="right">Sub Total</td>
        </tr>       
      @endif
       @php                 
        $id = $dato->OrderID;
      @endphp                
  		<tr>         
         <td>{{ ucwords($dato->ProductName) }}</td>             
         <td>{{ $dato->Quantity }}</td>        
         <td>{{ "$ ". $dato->UnitPrice }}</td>
         <td align="right">{{ "$ ". number_format($dato->UnitPrice * $dato->Quantity,2) }}</td>         
      </tr>      
  		@empty
  		<tr>
  			<td colspan="5" class="text-center">No hay ordenes para mostrar</td>
  		</tr>
  		@endforelse
  	</table>
    <div class="row justify-content-center">
      <div class="col-3">
        {{ $orders->links('pagination::bootstrap-4') }}
      </div>      
    </div>
  </div>
 @endsection

