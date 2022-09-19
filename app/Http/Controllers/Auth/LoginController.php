<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function index()
    {
      if(auth()->check()){
        return redirect()->route('dashboard.index');
      }

      return view('auth.login');
    }

    public function login(LoginRequest $request, UserRepository $repository)
    {
      $user = $repository->where('login',$request->login)->first();


      switch (true) {
        case !$user:
          $error = [__('auth.form.errors.login.exists')];
          return redirect()->back()->withErrors($error);   
          break;

        case !Hash::check($request->senha, $user->senha):
          $error = [__('auth.form.errors.senha.exists')];
          return redirect()->back()->withErrors($error);  
          break;
          
        case !$user->hasRole('administrador'):
          $error = [__('auth.form.errors.login.permission')];
          return redirect()->back()->withErrors($error);
          break;
          
        default:
          Auth::login($user);
          return redirect()->route('dashboard.index');
          break;
      }
    }

    public function logout()
    {
      Auth::logout();
      return redirect()->route('home');
    }
}
