 @extends('main')

 @section('title')
Venta de producto
 @endsection

 @section('content')
  <div class="mt-5 pt-4">
  	<h1>Nueva Venta</h1>
    @foreach($errors->all() as $error)
      <p class="alert alert-danger alert-dismissible">{{ $error }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button></p>
    @endforeach    
  	<div class="row">
     <div class="col-8">
      <form action="productosFactura" method="POST">
        <input type="hidden" name="_method" value="POST">      
        {{  csrf_field() }}
        <table class="table table hover">
          <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th class="text-right">Sub total</th>
          </tr>                                                  
        </table>
        <div id="campos">
        </div>  
     
      <div class="row">
        <div class="col-12">
         
        </div>      
      </div>    
      <div class="row mt-5">
        <div class="col-12">
          <div class="form-group">
            <a href="#" class="btn btn-info" onclick="AgregarCampos();">Agregar Campos</a>
            <input class="btn btn-primary mr-1" type="submit" value="Generar">
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
