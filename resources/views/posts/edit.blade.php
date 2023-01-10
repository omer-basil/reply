<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="w-full p-6 border mb-4 shadow rounded relative">
                        <h1 class="bold">{{$post->user->name}}</h1>
                        <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
                        @can('delete', $post)
                            <form action="{{ route('posts.destroy', $post) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 shadow rounded absolute right-2 top-2 bg-red-500/50 text-sm">
                                    Delete
                                </button>
                            </form>
                        @endcan
                        <hr>
                        <form action="" method="post">
                            <div class="p-4 space-y-4 flex flex-col">
                                <input name="title" type="text" class="p-2 text-md rounded w-5/6">
                                <textarea name="body" class="p-2 text-md rounded w-5/6 max:h-5/6 overflow-auto resize-none"></textarea>
                                <button type="submit" class="px-4 py-2 shadow rounded bg-sky-500/50 text-sm w-28">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
