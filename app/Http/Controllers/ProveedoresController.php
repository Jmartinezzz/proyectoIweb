<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;

class ProveedoresController extends Controller
{
   public function index(){
   	$provs = Proveedor::where('suppliers.eliminado', '=', '0')->orderBy('SupplierID', 'desc')->paginate(10);
   	return view('suppliers.suppliers', ['proveedores' => $provs]);
   }

   public function nuevo(){
   	return view('suppliers/nuevo');
   }

   public function guardar(Request $request)
   {
   	$this->validate($request, [
    		'compania' => 'required',
    		'contacto' => 'required',
    		'direccion' => 'required',
    		'telefono' => 'required|min:8|numeric',    		
    ]);
    	
    	$proveedor = new Proveedor;
    	$proveedor->CompanyName = $request->input('compania');
    	$proveedor->ContactName = $request->input('contacto');
    	$proveedor->Address = $request->input('direccion');    	    	
    	$proveedor->Phone = $request->input('telefono');
    	$proveedor->save();
    	return redirect('proveedores')->with('message', 'proveedorRegistrado');
   }

    public function borrar(Request $request, $id){                        
        $proveedor = Proveedor::find($id);        
        $proveedor->eliminado = 1;
        $proveedor->save();
        return redirect('proveedores')->with('message', 'proveedorEliminado');
        
    }


    public function editar($id)
    {
    	$proveedor = Proveedor::where('SupplierID',$id)->first();
        return view('suppliers.editar', ['proveedor' => $proveedor]);
    }

    public function modificar(Request $request, $id){
        $this->validate($request, [
    		'compania' => 'required',
    		'contacto' => 'required',
    		'direccion' => 'required',
    		'telefono' => 'required|min:8|numeric',    		
    	]);
        
        $proveedor = Proveedor::find($id);
        $proveedor->CompanyName = $request->input('compania');
    	$proveedor->ContactName = $request->input('contacto');
    	$proveedor->Address = $request->input('direccion');    	    	
    	$proveedor->Phone = $request->input('telefono');
    	$proveedor->save();
    	return redirect('proveedores')->with('message', 'proveedorModificado');        
    }
}
