<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="w-full p-6 border mb-4 shadow rounded relative">
                        <h1 class="bold">{{auth()->user()->name}}</h1>
                        <hr>
                        <form action="{{route('posts.store')}}" method="post">
                            @csrf
                            <div class="p-4 space-y-4 flex flex-col">
                                <input name="title" type="text" class="p-2 text-md rounded w-5/6">
                                <textarea name="body" class="p-2 text-md rounded w-5/6 max:h-5/6 overflow-auto resize-none"></textarea>
                                <button type="submit" class="px-4 py-2 shadow rounded bg-sky-500/50 text-sm w-28">
                                    Publish
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
