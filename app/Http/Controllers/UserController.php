<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function showRegistrationForm()
    {
        return view('auth.register'); 
    }

    
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'account_type' => 'required|in:transportadora,vendedor',
        ]);

        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'account_type' => $request->account_type,
        ]);

        return redirect()->route('register.form')->with('success', 'Usuário registrado com sucesso!');
    }

    public function listTransportadoras()
    {
        $transportadoras = User::where('account_type', 'transportadora')->get();

        return view('users.transportadoras', ['transportadoras' => $transportadoras]);
    }
}
