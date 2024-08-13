<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdoptedController extends Controller
{
    public function adopted()
    {

    $adoptedPosts = Post::where('is_adopted', true)->get();
    return view('pets.adopted', ['posts' => $adoptedPosts ]);


    }
}
