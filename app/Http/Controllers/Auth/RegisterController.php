<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\RequestUsuarios;
use Auth;
use Hash;
use Carbon\Carbon;

class RegisterController extends Controller
{

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/usuarios';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        Carbon::setUTF8(true);
        Carbon::setLocale('es');
      
        setlocale(LC_TIME, 'es_ES');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function index(){
        $usuarios = User::where('users.eliminado', '=', '0')->orderBy('id','DESC')->paginate(8);
        return view('users.users', ['usuarios' => $usuarios]);
    }

    public function nuevo(){        
        return view('users.register');
    }

    public function guardar(RequestUsuarios $request){        
       $usuario = new User;
        $usuario->name = $request->user;
        $usuario->email = $request->correo;
        $usuario->tipo = $request->tipo;
        $usuario->password = bcrypt($request->password);
        $usuario->save();
        return redirect('usuarios')->with('message', 'usuarioAgregado');
    }

    public function cambiarcontra(){        
        return view('users.cambiarcontra');
    }

    public function guardarcambiarcontra(Request $request){
        $request->validate([
            'contrasena_actual' => 'required|min:5|max:255',
            'contrasena_nueva' => 'required|min:5|max:255|same:contrasena_nueva_repetida',
            'contrasena_nueva_repetida' => 'required|min:3|max:255',
        ]);  

        $id = Auth::user()->id;
        $usuario = User::find($id);


        if (Hash::check($request->contrasena_actual,$usuario->password)) {
            $usuario->password = bcrypt($request->contrasena_nueva);
            if ($usuario->save()) {
                return redirect('usuarios/cuenta/'. $id)->with('message', 'contraModificada');
            }
        }else{
            return back()->with('paraContra', 'contraMala');
        } 
    }



    public function show($id){        
        $usuario =  User::where('id',$id)->where('eliminado', 0)->first();
        return view('users.cuenta', ['usuario' => $usuario]);
    }

     public function borrar(Request $request, $id){                        
        $usuario = User::find($id);        
        $usuario->eliminado = 1;
        $usuario->save();
        return redirect('usuarios')->with('message', 'usuarioEliminado');
        
    }

     public function editar($id){
        $usuario = User::where('id',$id)->first();
        return view('users.editar', ['usuario' => $usuario]);
    }


     public function modificar(RequestUsuarios $request, $id){              
        $usuario = User::findOrFail($id);
        $usuario->name = $request->user;
        $usuario->email = $request->correo;
        $usuario->tipo = $request->tipo;
        if ($usuario->save()) {
           return redirect('usuarios')->with('message', 'usuarioModificado');
        }else{
            return back()->withInput();
        }
        
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'tipo' => $data['tipo'],
        ]);
    }
}
