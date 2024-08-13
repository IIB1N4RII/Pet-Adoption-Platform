<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavBtn extends Component
{
    public $post;
    public $liked = false;

    public function mount($post )
    {
        $this->post = $post;
        if (Auth::check()) {
        $this->liked = Favorite::where('user_id', auth()->user()->id)->where('post_id', $post)->exists();
    }
    }
    

    public function toggleFavorite($postId)
    {
        if(!Auth::check()){
            return redirect()->route('login')
            ->with('error' ,'to add pets to favorites you have to login first !!!' );
        }
        if (Auth::check()) {
            $favorite = Favorite::where('user_id', Auth::user()->id)
            ->where('post_id', $postId)
            ->first();

                if ($favorite) {
                    $favorite->delete();
                    $this->liked = false;
                } 
                else {
                    Favorite::create([
                    'user_id' => Auth::user()->id,
                    'post_id' => (int) $postId, 
                    ]);
                    $this->liked = true;
                }
        } 
        else {
        
        session()->flash('message', 'You need to log in to favorite posts.');
        }
    }

      
    public function render()
    {
        return view('livewire.fav-btn');
    }
}
