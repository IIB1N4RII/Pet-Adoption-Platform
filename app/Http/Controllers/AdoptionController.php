<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Adoption;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class AdoptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filters = request()->only(
        'search',
        'animal_type',
        'age',
        'color',
        'size',
        'location_id',
        'sort',
        'gender'
        );

        $posts = Post::filter($filters)
        ->withCount('reports')
        ->when($filters['sort'] ?? null, function ($query, $sort) {
        if ($sort === 'latest') {
        $query->orderBy('created_at', 'desc');
        } elseif ($sort === 'oldest') {
        $query->orderBy('created_at', 'asc');
        } elseif ($sort === 'last_month') {
        $query->where('created_at', '<=', now()->subMonth());
            } elseif ($sort === 'random') {
            $query->inRandomOrder();
            }
            });

            $posts = $posts->latest()->paginate(6);

            return view('adoptions.index', ['posts' => $posts])->withQuery($filters);   
    }

    


 
}
