<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    
    protected $loginPath = 'login';
    protected $redirectPath = '/productos';

   

    public function username()
    {
        return 'name';
    }
}
