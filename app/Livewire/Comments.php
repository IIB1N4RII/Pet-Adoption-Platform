<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Comments extends Component
{
    
    public $postId;
    public $newComment = '';
    public $newReply = '';
    public $replyTo = null;
    public $editingCommentId = null;
    public $editingCommentContent = '';

   protected $listeners = ['commentAdded' => '$refresh'];

   public function mount($postId) {
    $this->postId = $postId;
   }

   public function addComment()
   {
     if(!Auth::check()){
     return redirect()->route('login')
     ->with('error' ,'to add Comment you have to login first !!!' );
     }

        $this->validate([
        'newComment' => 'required|string|max:255',
        ]);

        Comment::create([

        'post_id' => $this->postId,
        'user_id' => Auth::id(),
        'content' => $this->newComment,
        'parent_id' => null,

        ]);

        $this->newComment = '';
        $this->dispatch('commentAdded');
   }

   public function addReply($commentId)
   {
        $this->validate([
        'newReply' => 'required|string|max:255',
        ]);

        Comment::create([
        'post_id' => $this->postId,
        'user_id' => Auth::id(),
        'content' => $this->newReply,
        'parent_id' => $commentId,
        ]);

        $this->newReply = '';
        $this->replyTo = null;
        $this->dispatch('commentAdded');
   }

   public function setReplyTo($commentId) {
        $this->replyTo = $commentId;
   }

   public function setEditingComment($commentId, $content)
   {
        $this->editingCommentId = $commentId;
        $this->editingCommentContent = $content;
   }

   public function updateComment()
   {
        $this->validate([
        'editingCommentContent' => 'required|string|max:255',
    ]);

        $comment = Comment::find($this->editingCommentId);

        if ($comment && $comment->user_id == Auth::id()) {
        $comment->update(['content' => $this->editingCommentContent]);
        $this->editingCommentId = null;
        $this->editingCommentContent = '';
        $this->dispatch('commentAdded');
        }
    }

   public function deleteComment($commentId)
   {
        $comment = Comment::find($commentId);
        if ($comment && $comment->user_id == Auth::id()) {
            $comment->delete();
            $this->dispatch('commentAdded');
        }
   }

   public function render() {
    $comments = Comment::where('post_id', $this->postId)->whereNull('parent_id')->latest()->get();

    return view('livewire.comments', compact('comments'));
   }

    
}
