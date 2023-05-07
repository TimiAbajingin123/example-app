<?php

namespace App\Http\Livewire;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Comments extends Component
{
    public $post;
    public $comment;
    public $content;
    public $isEditing = false;
    //public $user_id;

    public function updateEditing($isEditing){
        $this-> isEditing = $isEditing;
        $this->editState = [
            'content' => $this -> content 
        ];
    }

    public function render()
    {
        return view('livewire.comments');
    }

    public function updateComment($id)
    {
        $post = Post::where('comment_id', $id);
        $validatedComment = $this->validate([
            'editMessage' => 'required|string|max:500',
        ]);
        $this->validate();
        Comment::where('id', $id)
            ->update([
                'content' => $validatedComment['editMessage'],
                'user_id' => $post->user_id,
                'post_id' => $post->id,
            ]);
    
        $this -> isEditing = false;
        
    }

    public function destroy($id)
    {
        $c = Comment::where('id', $id);
        $c->delete();
        return view('livewire.counter');
    }


    public function mount($comment, $post)
    {
        $this -> post = $post;
        $this -> comment = $comment;
        //$this->user_id = auth()->user()->id;
    }
}
