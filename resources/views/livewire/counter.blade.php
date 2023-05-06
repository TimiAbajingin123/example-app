<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>Author: {{$post->user->name}}</p>
                    <p>Title: {{$post->title}} </p>
                    <img src="{{$post->image}}" alt="no image" width="130" height="150">
                    
                    @if (Auth::check() && (Auth::user()->id == $post->user_id || Auth::user()->id == 1))
                        <span class="">
                            <a
                                href="/posts/{{$post->id}}/edit"
                                class="text-gray-700 italic hover:text-gray-900
                                pb-1 border-b-2">
                                Edit
                            </a>
                        </span>
                        <span class="">
                                <form
                                    action="/posts/{{$post->id}}/delete"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                
                                    <button
                                    class="text-gray-700 italic hover:text-gray-900
                                    pb-1 border-b-2">
                                    Delete
                                    </button>
                                
                                </form>
                                
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>                        
  
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (Auth::check())
                    <form wire:submit.prevent='createComment'>
                        <input type="string" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="add a comment" name = "content" id="content" wire:model.lazy="content">
                        <button href="" type="submit" class="p-2 bg-blue-500 w-20 rounded shadow dark:text-gray">Add</button>
                    </form>
                    @endif
                    <ul>
                        @foreach ($comments as $comment)
                        <li>User: {{$comment -> user -> name}} </li>
                        <li>Comment: {{$comment -> content}} </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

