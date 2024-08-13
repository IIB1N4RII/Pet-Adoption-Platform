<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('my_posts.index' ,
         ['pets' => auth()->user()->posts()->latest()->get()]
        
        );
    }

   
}
