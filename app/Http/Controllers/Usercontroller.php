<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Psy\CodeCleaner\ReturnTypePass;
use Illuminate\Support\Facades\Hash;
  

class Usercontroller extends Controller
{
    function login(Request $req)
    {
        return $req->input();

        $user = User::where(['email'=>$req->email])->first();


        if(!$user || !Hash:: check($req->password,$user->password)){
            return 'wronng';

        }else{
            $req->session()->put('user',$user);
            return redirect('/');
        }
    }
}
