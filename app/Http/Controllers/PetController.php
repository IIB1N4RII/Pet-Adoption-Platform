<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Post;
use Illuminate\Http\Request;

class PetController extends Controller
{
    
    public function index()
    {
        

         $posts = Post::query()
         
         ->withCount('reports') // Load the reports relation with the counts
         ->orderByRaw('reports_count >= 3 asc') // Move posts with 3 or more reports to the bottom
         ->latest() 
         ->take(6) 
         ->get();

         return view('pets.index', ['posts' => $posts]);
    }

   

   
    public function show($postID)

    {   $post = Post::with('user')->findOrFail($postID);
        return view('pets.show' , ["post" => $post]);
    }

    
}
