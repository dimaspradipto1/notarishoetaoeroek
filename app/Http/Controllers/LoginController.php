<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginauth(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password'  => 'required'
        ]);

        if ($validator->fails()) {
            Alert::error('Error', 'Login Failed')->autoclose(3000)->toToast();
            return redirect(route('login'));
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            Alert::success('Success', 'Login berhasil')->autoclose(3000)->toToast();
            return redirect(route('admin'));
        } else {
            Alert::error('Error', 'Login Failed')->autoclose(3000)->toToast();
            return redirect(route('login'));
        }

    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerauth(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password  = Hash::make($request->password);
        $user->roles = 'USER';
        $user->remember_token = Str::random(60);
        $user->save();

        Alert::success('Success', 'Register Success')->autoclose(3000)->toToast();
        return redirect(route('login'));


    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }

    
}
