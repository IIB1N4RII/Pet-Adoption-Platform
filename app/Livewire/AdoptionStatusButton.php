<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class AdoptionStatusButton extends Component
{
    public $postId;
    public $isAdopted;

    protected $listeners = ['statusUpdated' => '$refresh'];

    public function mount($postId)
    {
        $this->postId = $postId;
        $this->isAdopted = Post::find($postId)->is_adopted;
    }

    public function toggleAdoptionStatus()
    {
        $post = Post::find($this->postId);
        $post->is_adopted = !$post->is_adopted;
        $post->save();

        $this->isAdopted = $post->is_adopted;
        $this->dispatch('statusUpdated');
    }

    public function render()
    {
        return view('livewire.adoption-status-button');
    }
}
