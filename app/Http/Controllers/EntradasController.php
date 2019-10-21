<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entradas;

class EntradasController extends Controller
{
    public function guardaEntrada(Request $request){
        $this->validate($request, [
            'producto' => 'required',
            'cantidad' => 'required|numeric'           
        ]);
        
        $entrada = new Entradas;
        $entrada->ProductID = $request->input('producto');
        $entrada->cantidad = $request->input('cantidad');        
        $entrada->save();
        return redirect('productos/entradas')->with('message', 'entradaRegistrado');
    }
}
