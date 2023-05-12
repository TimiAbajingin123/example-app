<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * @param int $id
     */
    public function show($id)
    {
        $comments = Comment::all() -> where('post_id', $id);
        return view('comments.show', ['comments' => $comments]);
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $post_id = $comment ->commentable_id;
        $post = Post::findorFail($post_id);
        $comments = Comment::all() -> where('commentable_id', $post_id);
        $validatedComment = $request->validate([
            'content' => 'required|string|max:500',
        ]);
        
        Comment::where('id', $id)
            ->update([
                'content' => $validatedComment['content'],
                'user_id' => $comment->user_id,
                'commentable_id' => $post_id,
            ]);

        

        return redirect() -> route('posts.show', ['id' => $post_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $c = Comment::findOrFail($id);
        $c->delete();
        $post = Post::findOrFail($c->commentable_id);
        $comments = Comment::all() -> where('commentable_id', $post->id);
        return redirect() -> route('posts.show', ['id' => $post->id]);
    }
}
