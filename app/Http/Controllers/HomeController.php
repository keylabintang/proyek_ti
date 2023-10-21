<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index () {
        
        // $data = Product::all();
    
        // return view('user/home/home', compact('data'));
        return view('user/home/index');

    }
}
