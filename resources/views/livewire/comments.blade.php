<div>
    <p>User: {{$comment -> user -> name}} </p>
    @if ($isEditing)
    <p>Comment: </p>
    <form method='POST' 
        action="/posts/comment/{{$comment->id}}/update"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <textarea type="string" class="w-full rounded border shadow p-2 mr-2 my-2" name="content" >{{$comment -> content}}</textarea>
        <button type='submit' wire:click="updateEditing(false)" href="" class="p-2 bg-blue-500 w-20 rounded shadow dark:text-gray">edit</button>
    </form>
    @elseif (Auth::check() && (Auth::user()->id == $comment->user_id))
    <p>Comment: {{$comment -> content}} </p>
    <button type='button' wire:click="updateEditing(true)" class="p-2 bg-blue-500 w-20 rounded shadow dark:text-gray">edit</button>
    @else
    <p>Comment: {{$comment -> content}} </p>
    @endif
    @if (Auth::check() && (Auth::user()->id == $comment->user_id || Auth::user()->id == 1))
    <form 
     action="/posts/comment/{{$comment->id}}/delete"
     method="POST">
    @csrf
    @method('delete')
    <button type='submit' href="" class="p-2 bg-blue-500 w-20 rounded shadow dark:text-gray">delete</button>
    </form>
    @endif
</div>
