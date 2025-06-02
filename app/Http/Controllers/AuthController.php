<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
  public function register(Request $request)
{
    $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed|min:6',
    ]);

    User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
    ]);

    return redirect()->route('login')->with('success', 'Inscription réussie. Connectez-vous.');
}


    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            return redirect()->route('livres.index');
        }
    
        return back()->withErrors(['email' => 'Identifiants incorrects']);
    }
    
  

   



    public function logout(Request $request)
    {
        Auth::logout(); // Déconnecte l'utilisateur
        $request->session()->invalidate(); // Invalide la session
        $request->session()->regenerateToken(); // Régénère le token CSRF
    
        return redirect('/login'); // Redirige vers la page de connexion
    }
    

public function showRegisterForm() {
    return view('auth.register');
}

public function showLoginForm() {
    return view('auth.login');
}




}

