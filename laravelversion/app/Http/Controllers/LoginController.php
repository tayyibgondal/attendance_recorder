<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function login(Request $request){
        echo "<pre>";
        print_r($request->all()) ;

    }
}