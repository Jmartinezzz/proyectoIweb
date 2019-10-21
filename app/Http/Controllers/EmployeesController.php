<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;

class EmployeesController extends Controller
{
    public function index(){
    	$empleados = Empleado::where('eliminado', '=', '0')->orderBy('EmployeeID', 'desc')->paginate(10);;
    	return view('employees.employees', ['empleados' => $empleados]);
    }

    public function nuevo(){
    	return view('employees.nuevo');
    }

    public function guardar(Request $request){
    	$this->validate($request, [
    		'nombre' => 'required',
    		'apellido' => 'required',
    		'fechaNac' => 'required|date',
    		'telefono' => 'required|min:8|numeric',
    		'direccion' => 'required'
    	]);
    	
    	$empleado = new Empleado;
    	$empleado->LastName = $request->input('apellido');
    	$empleado->FirstName = $request->input('nombre');
    	$empleado->BirthDate = $request->input('fechaNac');
    	$empleado->Address = $request->input('direccion');
    	$empleado->Phone = $request->input('telefono');
    	$empleado->save();
    	return redirect('empleados')->with('message', 'empleadoRegistrado');
    }


    public function borrar(Request $request, $id){                        
        $empleado = Empleado::find($id);        
        $empleado->eliminado = 1;
        $empleado->save();
        return redirect('empleados')->with('message', 'empleadoEliminado');
        
    }

    public function editar($id){
        $empleado = Empleado::where('EmployeeID',$id)->first();
        return view('employees.editar', ['empleado' => $empleado]);
    }

    public function modificar(Request $request, $id){
        $this->validate($request, [
            'nombre' => 'required',
            'apellido' => 'required',
            'fechaNac' => 'required|date',
            'telefono' => 'required|min:8|numeric',
            'direccion' => 'required'
        ]);
        
        $empleado = Empleado::find($id);
        $empleado->LastName = $request->input('apellido');
        $empleado->FirstName = $request->input('nombre');
        $empleado->BirthDate = $request->input('fechaNac');
        $empleado->Address = $request->input('direccion');
        $empleado->Phone = $request->input('telefono');
        $empleado->save();
        return redirect('empleados')->with('message', 'empleadoModificado');
    }
}
