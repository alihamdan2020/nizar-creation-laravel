<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class userController extends Controller
{
    public function logIn(request $req){
        $username=$req->input('username');
        $password=$req->input('password');

        $user=DB::table('users')->where('name',$username)->get();
        if(count($user)==1)
        {
            Session::put("message",true);
            return redirect('/admin');
        }
        
        else{
            Session::put("message","wrong username or password");
            return redirect('/login');
        }
        
        //mean return to the route that named /login
    }

    public function signOut(){
        session()->flush();
        return redirect("/");
    }
}
