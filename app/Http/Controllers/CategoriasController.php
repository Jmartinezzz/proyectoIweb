<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categoria;
use Illuminate\Support\Facades\DB;

class CategoriasController extends Controller
{
    public function index(Request $request){
        $cateName = $request->get('np');
    	$categorias = Categoria::where('eliminado', '=', '0')
                    ->orderBy('CategoryID', 'desc')
                    ->name($cateName)
                    ->paginate(10);
    	return view('categories/categorias', ['categorias' => $categorias]);
    }

    public function nueva(){
    	return view('categories/nueva');
    }

    public function guardar(Request $request){
    	$this->validate($request, [
    		'categoria' => 'required'
    	]);
    	
    	$categoria = new Categoria;
    	$categoria->CategoryName = $request->input('categoria');
    	$categoria->Description = $request->input('descripcion');
    	$categoria->save();
    	return redirect('categorias')->with('message', 'categoriaRegistrada');
    }

    public function borrar(Request $request, $id){                        
        $categoria = Categoria::find($id);        
        $categoria->eliminado = 1;
        $categoria->save();
        return redirect('categorias')->with('message', 'categoriaEliminada');
        
    }

    public function editar($id){
        $categoria = Categoria::where('CategoryID',$id)->first();
        return view('categories.editar', ['categoria' => $categoria]);
    }

    public function modificar(Request $request, $id){
        $this->validate($request, [
            'categoria' => 'required'
        ]);
        
        $categoria = Categoria::find($id);
        $categoria->CategoryName = $request->input('categoria');
        $categoria->Description = $request->input('descripcion');
        $categoria->save();
        return redirect('categorias')->with('message', 'categoriaModificada');
    }
}
