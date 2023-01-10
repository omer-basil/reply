@foreach($comments->reverse() as $comment)
    <div class="flex" x-data="{ open:false, openReply:false }">
        <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
            @if(!$comment->user)
                <strong>{{ $comment->user->name }}</strong>
                @else
                <strong><a href="{{ route('profile.index', $comment->user) }}">{{ $comment->user->name }}</a></strong>
            @endif
            <span class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>

            <p class="text-sm">
                {{ $comment->text }}
            </p>
            <a href="" @click.prevent="openReply = !openReply">Reply</a>
            @if($comment->replies->count())
                <div class="text-sm text-gray-500 font-semibold">
                    <a href="" @click.prevent="open = !open">
                        View {{ $comment->replies->count() }} {{ Str::plural('Reply', $comment->replies->count()) }}
                    </a>
                </div>
                <div x-show="open">
                    @include('components.replies', ['comments' => $comment->replies])
                </div>
            @endif
            <div x-show="openReply">
                    @auth()
                        <livewire:make-comment :post="$post" :col="$comment->id" :key="$comment->id . uniqid()"/>
                    @endauth()
                </div>
        </div>
    </div>
@endforeach
