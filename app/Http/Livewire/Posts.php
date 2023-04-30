<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Posts extends Component
{
    public function render()
    {
        return view('livewire.posts');
    }

    public function createComment()
    {
        return view('posts.index');
    }
}
