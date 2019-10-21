<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

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
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function index(){
        $usuarios = DB::table('users')->where('users.eliminado', '=', '0')->paginate();
        return view('users.users', ['usuarios' => $usuarios]);
    }

    public function nuevo(){        
        return view('users.register');
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

     public function modificar(Request $request, $id){              
        $usuario = User::find($id);
        $usuario->tipo = $request->input('tipo');            
        $usuario->save();
        return redirect('usuarios')->with('message', 'usuarioModificado');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
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
