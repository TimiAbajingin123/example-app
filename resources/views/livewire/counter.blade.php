
<section>
<div>
    @if (Auth::check())
        <form wire:submit.prevent='createComment'>
            <input type="string" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="add a comment" name = "content" id="content" wire:model.lazy="content">
            <button href="" type="submit" class="p-2 bg-blue-500 w-20 rounded shadow dark:text-gray">Add</button>
        </form>
    @endif

    @foreach ($comments as $comment)
    <div>
        <p>User: {{$comment -> user -> name}} </p>
        @if ($isEditing && $edited_id==$comment->id)
        <p>Comment: </p>
        <form method='POST' 
            action="/posts/comment/{{$comment->id}}/update"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <textarea type="string" class="w-full rounded border shadow p-2 mr-2 my-2" name="content" >{{$comment -> content}}</textarea>
            <button type='submit' wire:click="updateEditing2(false)" href="" class="p-2 bg-blue-500 w-20 rounded shadow dark:text-gray">edit</button>
        </form>
        @elseif (Auth::check() && (Auth::user()->id == $comment->user_id))
        <p>Comment: {{$comment -> content}} </p>
        <form 
        action="/posts/comment/{{$comment->id}}/delete"
        method="POST">
        @csrf
        @method('delete')
        <button type='button' wire:click="updateEditing(true, {{$comment->id}})" class="p-2 bg-blue-500 w-20 rounded shadow dark:text-gray">edit</button>
        @else
        <p>Comment: {{$comment -> content}} </p>
        @endif
        @if (Auth::check() && (Auth::user()->id == $comment->user_id || Auth::user()->id == 1))
       
        <button type='submit' x-on:click="confirmCommentDeletion" 
        href="" class="p-2 bg-blue-500 w-20 rounded shadow dark:text-gray"
        x-data="{
            confirmCommentDeletion(){
                if (window.confirm('Confirm delete')){
                    @this.call(destroy({{$comment->id}}))
                }
            }
        }">delete</button>
        </form>
        @endif
    </div>

    @endforeach
        
</div>
</section>
            

