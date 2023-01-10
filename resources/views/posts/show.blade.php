<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 relative">
                    @can('update', $post)
                        <button class="px-4 py-2 shadow rounded bg-yellow-400 absolute right-8 top-8 bg-sky-500/50 text-sm">
                            <a href="{{ route('posts.edit', $post) }}">
                                Edit
                            </a>
                        </button>
                    @endcan
                    <hr>
                    <x-post :post="$post" />
                    <div>
                        <livewire:react :post="$post" />
                    </div>
                    <div>
                        @auth()
                            <livewire:make-comment :post="$post" :col="0" :key="$post->id"/>
                        @endauth()
                        <livewire:comments :post="$post"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
