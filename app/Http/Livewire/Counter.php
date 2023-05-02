<?php

namespace App\Http\Livewire;
use App\Models\Comment;

use Livewire\Component;

class Counter extends Component
{
    public $post;
    public $comments;
    public String $content;
    //public $user_id;

    protected $rules = [
        'content' => 'required|string|max:500'
    ];
    public function render()
    {
        return view('livewire.counter');
    }
    public function createComment()
    {
        //$this->validate([
            //'content' => 'required',
        //]);
        //$this->user_id = auth()->user()->id;
        $this->validate();
        if(trim($this->content)!=""){
            $comment = new Comment;
            $comment->post_id = $this->post->id;
            $comment->user_id = \Auth::user()->id;
            $comment->content = $this->content;

            $comment->save();
            session()->flash('message', 'Post was created.');
            $this -> content="";
        }
        
    }

    public function mount($post)
    {
        $this -> post = $post;
        $this -> comments = Comment::all() -> where('post_id', $this -> post -> id);
        //$this -> content ="2";
        //$this->user_id = auth()->user()->id;
    }
}
