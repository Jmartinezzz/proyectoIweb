<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class CustomersController extends Controller
{
    public function index(){
    	$clientes = Cliente::where('eliminado', '=', '0')->orderBy('CustomerID', 'desc')->paginate(10);
    	return view('customers.customers', ['clientes' => $clientes]);
    }

    public function nuevo(){
    	return view('customers.nuevo');
    }

    public function guardar(Request $request){
    	$this->validate($request, [
    		'nombreCompania' => 'required',
    		'nombreContacto' => 'required',
    		'direccion' => 'required',
    		'telefono' => 'required|min:8|numeric',
    		
    	]);
    	
    	$cliente = new Cliente;
    	$cliente->CompanyName = $request->input('nombreCompania');
    	$cliente->ContactName = $request->input('nombreContacto');    	
    	$cliente->Address = $request->input('direccion');
    	$cliente->Phone = $request->input('telefono');
    	$cliente->save();
    	return redirect('clientes')->with('message', 'clienteRegistrado');
    }

    public function borrar(Request $request, $id){                        
        $cliente = Cliente::find($id);        
        $cliente->eliminado = 1;
        $cliente->save();
        return redirect('clientes')->with('message', 'clienteEliminado');
        
    }

    public function editar($id){
        $cliente = Cliente::where('CustomerID',$id)->first();
        return view('customers.editar', ['cliente' => $cliente]);
    }

    public function modificar(Request $request, $id){
        $this->validate($request, [
            'nombreCompania' => 'required',
            'nombreContacto' => 'required',
            'direccion' => 'required',
            'telefono' => 'required|min:8|numeric',            
        ]);
        
        $cliente = Cliente::find($id);
        $cliente->CompanyName = $request->input('nombreCompania');
        $cliente->ContactName = $request->input('nombreContacto');      
        $cliente->Address = $request->input('direccion');
        $cliente->Phone = $request->input('telefono');
        $cliente->save();
        return redirect('clientes')->with('message', 'clienteModificado');
    }
}
