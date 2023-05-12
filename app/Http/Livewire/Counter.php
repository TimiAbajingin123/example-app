<?php

namespace App\Http\Livewire;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Notifications\NewComment;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Counter extends Component
{
    public $user;
    public $post;
    public $comments;
    public String $content;
    public $isEditing = false;
    public $edited_id = 0;
    //public $user_id;

    public function updateEditing($isEditing, $id){
        $this-> isEditing = $isEditing;
        $this->edited_id = $id;
    }

    public function updateEditing2($isEditing){
        $this-> isEditing = $isEditing;
        $this->edited_id = 0;
    }

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
            //$comment->post_id = $this->post->id;
            $comment->commentable_id = $this->post->id;
            $comment->commentable_type = 'App\Models\Post';
            $comment->user_id = \Auth::user()->id;
            $comment->content = $this->content;

            $comment->save();
            $this->user->notify(new NewComment(\Auth::user(), $this->post, $comment));
            session()->flash('message', 'Comment was created.');
           
        }
        $this->emit('refresh');
        return redirect() -> route('posts.show', ['id' => $this->post->id])
            ->with('message', 'Your comment has been posted');
        
    }

    public function destroy($id)
    {
        $c = Comment::findOrFail($id);
        $c->delete();
        $post = Post::findOrFail($c->post_id);
        $comments = Comment::all() -> where('post_id', $post->id);
    }




    public function mount($post)
    {
        $this -> post = $post;
        $this -> comments = Comment::all() -> where('commentable_id', $this -> post -> id);
        //$this -> content ="2";
        $this->user = User::findOrFail($this -> post -> user_id);
    }
}
