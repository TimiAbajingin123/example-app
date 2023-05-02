<?php

namespace App\Http\Livewire;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

use Livewire\Component;

class Posts extends Component
{
    public $post;
    public $comments;
    public $content;
    //public $user_id;
    public function render()
    {
        return view('livewire.posts');
    }

    public function createComment()
    {
        //$this->validate([
            //'content' => 'required',
        //]);
        //$this->user_id = auth()->user()->id;
        if(trim($this->content)!=""){
            $comment = new Comment;
            $comment->post_id = $this->post->id;
            $comment->user_id = \Auth::user()->id;
            $comment->content = $this->content;

            $comment->save();
            session()->flash('message', 'Post was created.');
        }
        
    }

    public function mount($post)
    {
        $this -> post = $post;
        $this -> comments = Comment::all() -> where('post_id', $this -> post -> id);
        //$this->user_id = auth()->user()->id;
    }
}
