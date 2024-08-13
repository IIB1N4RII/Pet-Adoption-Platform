<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $favorites = $user->favoritePosts()->latest()->get();
        return view('fav.index' , ['favs' => $favorites ]);
    }


}
