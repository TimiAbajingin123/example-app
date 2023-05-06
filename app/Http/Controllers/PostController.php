<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$id = auth() -> user() ->id;
        $posts = Post::paginate(3);
        return view('posts.index', ['posts' => $posts]);
    
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create(string $caption)
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedPost = $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);
        $newImageName = uniqid() . '-' . $request->title . '.' .
        $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        $id = auth() -> user() ->id;

        $p = new Post;
        $p->title = $validatedPost['title'];
        $p->user_id = $id;
        $p->image = 'images/'. $newImageName;

        $p->save();
        session()->flash('message', 'Post was created.');
        return redirect()->route('posts');

    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $comments = Comment::all() -> where('post_id', $id);
        return view('posts.show', ['post' => $post], ['comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $comments = Comment::all() -> where('post_id', $id);
        return view('posts.edit', ['post' => $post], ['comments' => $comments]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $validatedPost = $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);
        $newImageName = uniqid() . '-' . $request->title . '.' .
        $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
        Post::where('id', $id)
            ->update([
                'title' => $validatedPost['title'],
                'user_id' => $post->user_id,
                'image' => 'images/'. $newImageName,
            ]);

        return redirect('/posts')
            ->with('message', 'Your post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $p = Post::where('id', $id);
        $p->delete();
        return redirect('/posts')
            ->with('message', 'Your post has been deleted');
    }
}
