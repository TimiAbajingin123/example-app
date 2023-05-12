<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form 
                        method="POST"
                        action="{{route('posts.store')}}"
                        enctype="multipart/form-data">
                        @csrf
                        <input 
                            type="text"
                            name="title"
                            placeholder="Title..."
                            class="block mt-1 w-full">

                        <div class="bg-grey-lighter pt-15">
                            <label class="w-44 flex flex-col items-center px-2 py-3
                            bg-white-rounded-lg shadow-lg tracking-wide uppercase border
                            border-blue cursor-pointer">
                                <span class="mt-2 text-base leading-normal">
                                    Select a file
                                </span>
                                <input
                                    type="file"
                                    name="image"
                                    >
                            </label>
                            
                            <input 
                            type="submit"
                            class="text-gray-700 italic hover:text-gray-900
                                pb-1 border-b-2"
                            value="submit">
                        </div>
                        @if($errors->any())
                    </form>
                    @if($errors->any())
                    <div>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>    
    </div>
</x-app-layout>