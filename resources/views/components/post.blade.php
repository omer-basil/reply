@props(['post' => $post])

<div>
    <div class="w-full p-6 border mb-4 shadow rounded relative">
        <h1 class="bold text-lg underline"><a href="{{route('profile.index', $post->user)}}">{{$post->user->name}}</a></h1>
        <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
        <hr>
        <h1 class="mt-4 text-lg underline"><a href="{{ route('posts.show', $post->title) }}">{{$post->title}}</a></h1>
        <p>{{$post->body}}</p>
    </div>
</div>