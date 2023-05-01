<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Posts extends Component
{
    public $post;
    public $comments;
    public function render()
    {
        return view('livewire.posts');
    }

    public function createComment($user_id)
    {
        return view('livewire.counter');
    }

    public function mount($post, $comments)
    {
        $this -> post = $post;
        $this -> comments = $comments;
    }
}
