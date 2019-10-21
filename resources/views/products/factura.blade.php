 @extends('main')

 @section('title')
F a c t u r a
 @endsection

 @section('content')
  <div class="mt-5 pt-4">
  	<h1 class="display-4">Factura</h1>
    @foreach($errors->all() as $error)
      <p class="alert alert-danger alert-dismissible">{{ $error }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button></p>
    @endforeach  
  	<div class="row">
     <div class="col-8">
      <form action="guardarFactura" method="POST">
        cliente:
        <select name="cliente" class="form-control mb-3">
          <option value="" selected="true">-------Seleccione------</option>
          @foreach ($clis as $cli)
            <option value="{{ $cli->CustomerID }}">{{ $cli->CompanyName }}</option>
          @endforeach
          
        </select>
        <input type="hidden" name="_method" value="POST">      
        {{  csrf_field() }}
        <table class="table table hover">
          <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th class="text-right">Sub total</th>
          </tr>          
          @php
            $conta=0;
            $total=0;
          @endphp
          @foreach($productos as $producto)            
          <input type="hidden" name="productosArray[]" value="{{ $productos[$conta][0]->ProductID }}">
          <input type="hidden" name="cantidadArray[]" value="{{ $cantidad[$conta] }}">
            <tr>
              <td>{!! $productos[$conta][0]->ProductName !!}</td>
              <td>{!! $productos[$conta][0]->UnitPrice !!}</td>
              <td>{!! $cantidad[$conta] !!}</td>
              <td class="text-right">{!! ($productos[$conta][0]->UnitPrice * $cantidad[$conta]) !!}</td>
            </tr>            
            @php
              $total +=($productos[$conta][0]->UnitPrice * $cantidad[$conta]);
              $conta++;
            @endphp
          @endforeach
          <tr>
            <td colspan="4" class="text-right">Total: {{ " $ ". number_format($total,2) }}</td>
            <input type="hidden" name="total" value="{{ $total }}">
          </tr>                                                  
        </table>                   
      <div class="row mt-5">
        <div class="col-12">
          <div class="form-group">            
            <input class="btn btn-primary mr-1" type="submit" value="Guardar">
            <a href="{{ url('productos') }}" class="btn btn-dark text-white"> Cancelar</a>
          </div>
        </div>             
      </div>
      </form>
      </div>    
    </div>
 @endsection
 @section('scriptsFooter')
  <script>        
    var nextinput = 0;
    function AgregarCampos(){
    const prods = @json($productos);    
    nextinput++;
    campo ='<table class="table table-row"><tr><td width="40%">'
    campo += '<select class="custom-select" id="prod' + nextinput + '" name="productosArray[]">';
    for(producto in prods){  
      campo +='<option value="'+prods[producto]["ProductID"]+'">'+prods[producto]["ProductName"]+'   ('+prods[producto]["UnitPrice"]+')'+'</option>';
    }
    campo +='</select></td>';    
    campo +='<td width="15%"><input required type="text" size="7" name="cantidadArray[]" class="form-group" id="cantidad' + nextinput + '"></td>';
    campo +='<td width="30%"><input type="text" class="float-right" size="13" readonly class="form-group" id="sb' + nextinput + '"></td>';
    campo +='</tr></table>';
    $("#campos").append(campo);
  }    
  </script>
 @endsection
