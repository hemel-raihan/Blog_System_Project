<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
   
    
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        return view('welcome',compact('categories'));
    }
}
