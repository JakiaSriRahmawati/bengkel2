<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login(){
        return view("Admin.login");
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route("home");
    }

}
