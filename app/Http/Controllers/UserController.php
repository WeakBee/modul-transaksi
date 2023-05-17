<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function transaksiHome(){
        if (Auth::check()) {
            // The user is logged in...
            $transaksi = Transaksi::all();
            $username = Auth::user()->username;
            $user = User::whereUsername($username)->first();
            return view('index',['transaksi' => $transaksi,'user' => $user]);
        } else{
            return view('index');
        }
        
    }
    public function login(Request $request){
        $incomingFields = $request->validate([
            'loginusername' => 'required',
            'loginpassword' => 'required'
        ]);

        if(auth()->attempt(['username'=>$incomingFields['loginusername'], 'password'=>$incomingFields['loginpassword']])){
            $request->session()->regenerate();
        }

        return redirect('/');
    }
    public function logout(){
        auth()->logout();
        return redirect('/');
    }
    public function register(Request $request){
        $incomingFields = $request->validate([
            'email' => ['required', 'email', Rule::unique('users','email')],
            'username' => ['required', Rule::unique('users','username')],
            'password' => 'required'
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/');
    }
}
