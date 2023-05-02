

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
                    <p>Title: {{$post->title}} </p>
                    <img src="{{$post->image}}" alt="no image" width="130" height="150">
                </div>
            </div>
        </div>
    </div>                        
  
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form wire:submit.prevent='createComment' method='POST'>
                        <input type="text" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="add a comment" id="content" wire:model="content" class="form-control">
                        <a href="" type="submit" class="p-2 bg-blue-500 w-20 rounded shadow dark:text-gray">Add</a>
                    </form>
                    
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
