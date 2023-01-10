<div>
    <h3 class="mb-4 text-lg font-semibold text-gray-900">{{ $post->CommentsCount() }} {{ Str::plural('Comment', $post->CommentsCount()) }}</h3>
    <div class="space-y-4">
        @include('components.replies', ['comments' => $post->comments])
    </div>
</div>
