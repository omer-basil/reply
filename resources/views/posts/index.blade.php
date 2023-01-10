<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts Index') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                @foreach($posts as $post)
                    <div class="w-full p-6 border mb-4 shadow rounded relative">
                        <h1 class="bold">{{$post->user->name}}</h1>
                        <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
                        <hr>
                        <h1 class="mt-4 text-lg underline"><a href="{{ route('posts.show', $post->title) }}">{{$post->title}}</a></h1>
                        <p>{{$post->body}}</p>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
