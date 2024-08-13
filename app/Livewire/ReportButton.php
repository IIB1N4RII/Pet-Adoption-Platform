<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Report;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ReportButton extends Component
{

    public $post;
    public $open = false;
    public $reportSubmitted = false;
    public $alreadyReported = false;

    protected $listeners = ['reportPost'];

    public function mount($postId)
    {
    $this->post = Post::findOrFail($postId);
    }

    public function reportPost($reason)
    {
    // Check if the user has already reported this post
    $existingReport = Report::where('post_id', $this->post->id)
    ->where('user_id', Auth::id())
    ->first();

    if ($existingReport) {
    $this->alreadyReported = true;
    Session::flash('error', 'You have already reported this post.');
    return redirect()->to('/pets/' .$this->post->id );
    }

    if (!Auth::check()) {
        Session::flash('error', 'You have to logged in to report a post.');
        return redirect()->to('/login');
    } else {
        Report::create([
        'post_id' => $this->post->id,
        'user_id' => Auth::id(),
        'reason' => $reason,
        ]);
    }

    

    // Handle post deletion and date adjustment
    $reportCount = $this->post->reports()->count();

    

    $this->open = false;
    $this->reportSubmitted = true;
    Session::flash('success', 'Report submitted successfully.' );
    return redirect()->to('/pets/' .$this->post->id );
    
    }

    public function render()
    {
        return view('livewire.report-button');
    }
}
