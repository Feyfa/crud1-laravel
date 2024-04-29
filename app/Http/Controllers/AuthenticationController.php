<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function loginView(): Response
    {
        return response()->view('login', [
            'title' => 'Halaman Login'
        ]);
    }

    public function loginStore(Request $request): RedirectResponse
    {
        if($request->has('login_submit'))
        {
            $credentials = $request->validate([
                'username' => ['required'],
                'password' => ['required']
            ]);

            if(Auth::attempt($credentials))
            {
                $request->session()->regenerate();

                return redirect()->intended('/');
            }

            return redirect()->back()->with('flash', [
                'status' => 'error',
                'message' => 'Login Error'
            ]);
        }
        else 
        {
            return redirect()->back();
        }
    }
    
    public function registerView(): Response
    {
        return response()->view('register', [
            'title' => 'Halaman Register'
        ]);
    }

    public function registerStore(Request $request): RedirectResponse  
    {
        if($request->has('register_submit'))
        {
            $validated = $request->validate([
                'username' => ['required', 'min:3', 'unique:users,username'],
                'password' => ['required', 'min:5']
            ]);

            $validated['password'] = Hash::make($validated['password']);
            
            User::create($validated);

            return redirect('/login')->with('flash', [
                'status' => 'success',
                'message' => 'Register Success'
            ]);
        }
        else 
        {
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        if($request->has('logout_submit'))
        {
            Auth::logout();
    
            $request->session()->invalidate();
    
            $request->session()->regenerateToken();
    
            return redirect('/login');
        }
        else 
        {
            return redirect()->back();
        }
    }
}
