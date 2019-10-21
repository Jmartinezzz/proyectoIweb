<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Categoria;
use App\Cliente;
use App\Proveedor;
use App\Entradas;
use App\Order;
use App\Detalle;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    public function index(){        
    	$productos = DB::table('products')
    				->join('categories', 'products.CategoryID', '=', 'categories.CategoryID')
            		->join('suppliers', 'products.SupplierID', '=', 'suppliers.SupplierID')
            		->select('products.*', 'categories.CategoryName' , 'suppliers.CompanyName')
            		->orderBy('ProductID', 'desc')->where('products.eliminado', '=', '0')                    
            		->paginate(10);
    	return view('products.products', ['productos' => $productos]);
    }

    public function nuevo(){
    	$proveedores = Proveedor::where('suppliers.eliminado', '=', '0')->get();
    	$categorias = DB::table('categories')->where('categories.eliminado', '=', '0')->get();
    	return view('products.nuevo',['proveedores' => $proveedores, 'categorias' => $categorias]);
    }

     public function entradas(){        
        $pro = Producto::where('eliminado', '=' ,'0')->get();
        $entradas = DB::table('entradas')
                    ->join('products', 'entradas.ProductID', '=', 'products.ProductID')                    
                    ->select('entradas.*','products.ProductName') 
                    ->orderBy('idEntrada', 'desc')                   
                    ->paginate(7);
        return view('products.entradas',['productos' => $pro, 'entradas' => $entradas]);
    }

    public function ventas(){        
        $pro = Producto::where('eliminado', '=' ,'0')->get();      
        return view('products.ventas',['productos' => $pro]);
    }

    public function productosFactura(Request $request){                        
        $productos = $request->input('productosArray');
        $cantidad = $request->input('cantidadArray');
        $clis = Cliente::where('eliminado', '=' ,'0')->get();  
        $n = count($productos);
        $productosVista = array();
        for($i = 0;$i < $n;$i++){
            $productosVista[$i] = Producto::where('ProductID',$productos[$i])->get();
        }    
        return view('products.factura',['productos' => $productosVista, 'cantidad' => $cantidad, 'clis' => $clis]);        
    }

    public function guardarFactura(Request $request)
    {
        $productos = $request->input('productosArray');
        $cantidads = $request->input('cantidadArray');
        $n = count($productos);        
        
        $order = new Order;
        $order->total = $request->input('total');
        $order->CustomerID = $request->input('cliente');
        if ($order->save()) {
            $ultimaOrden = Order::latest()->first();
            for($i=0;$i<$n;$i++) {
                $detalle = new Detalle;
                $detalle->OrderID = $ultimaOrden->OrderID;
                $detalle->ProductID = $productos[$i];
                $detalle->Quantity = $cantidads[$i];
                DB::table('products')->where('ProductID', $productos[$i])->decrement('UnitsInStock', $cantidads[$i]);
                $detalle->save();
            }
        }
        return redirect('productos/ordenes')->with('message', 'ordenRegistrada');        
    }

    public function guardar(Request $request){
    	$this->validate($request, [
    		'nombre' => 'required',
    		'precioU' => 'required|numeric',
    		'cantidad' => 'required|numeric',
    		'proveedor' => 'required|numeric',
    		'categoria' => 'required|numeric'
    	]);
    	
    	$producto = new Producto;
    	$producto->ProductName = $request->input('nombre');
    	$producto->SupplierID = $request->input('proveedor');
    	$producto->CategoryID = $request->input('categoria');
    	$producto->UnitPrice = $request->input('precioU');
    	$producto->UnitsInStock = $request->input('cantidad');
    	$producto->save();
    	return redirect('productos')->with('message', 'productoRegistrado');
    }

    public function borrar(Request $request, $id){                        
        $productos = Producto::find($id);        
        $productos->eliminado = 1;
        $productos->save();
        return redirect('productos')->with('message', 'productoEliminado');
        
    }

    public function editar($id){
        $producto = Producto::where('ProductID',$id)->first();
        $proveedores = Proveedor::where('suppliers.eliminado', '=', '0')->get();
        $categorias = Categoria::where('categories.eliminado', '=', '0')->get();
        return view('products.editar', ['producto' => $producto, 'proveedores' => $proveedores, 'categorias' => $categorias]);
    }

    public function modificar(Request $request, $id){
        $this->validate($request, [
           'nombre' => 'required',
            'precioU' => 'required|numeric',
            'cantidad' => 'required|numeric',
            'proveedor' => 'required|numeric',
            'categoria' => 'required|numeric'
        ]);
        
        $producto = Producto::find($id);
        $producto->ProductName = $request->input('nombre');
        $producto->SupplierID = $request->input('proveedor');
        $producto->CategoryID = $request->input('categoria');
        $producto->UnitPrice = $request->input('precioU');
        $producto->UnitsInStock = $request->input('cantidad');
        $producto->save();
        return redirect('productos')->with('message', 'productoModificado');
    }
}
