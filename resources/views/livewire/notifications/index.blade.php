<div>
    @foreach($notifications as $notification)
        @if(!$notifications->isEmpty())

            <div class="w-96 flex justify-between px-3 bg-white py-4 items-center gap-2 rounded-lg border border-gray-100">
                <div wire:click="markAsRead('{{ $notification->id }}')" >
                    @if($notification->type === "App\Notifications\CommentNotification")
                        <a href="{{ route('posts.show', $notification->data['comment']['post']) }}" class="block">
                            <span class="font-mono"><strong>{{$notification->data['comment']['user']}}</strong> has commented on your post: </span>
                            <span class="font-mono text-sm italic">"{{$notification->data['comment']['post']}}"</span> <span class="text-xs">{{$notification->created_at->diffForHumans()}}</span>
                        </a>
                    @elseif($notification->type === "App\Notifications\LikeNotification")
                        <a href="{{ route('posts.show', $notification->data['like']) }}" class="block">
                            <span class="font-mono"><strong>{{$notification->data['like']['user']}}</strong> has liked your post: </span>
                            <span class="font-mono text-sm italic">"{{$notification->data['like']['post']}}"</span> <span class="text-xs">{{$notification->created_at->diffForHumans()}}</span>
                        </a>
                    @endif
                </div>
                <div class="flex gap-2">
                    <button wire:click="markAsRead('{{ $notification->id }}')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>

        @else
            <p>There is no unread notifications!</p>
        @endif

    @endforeach
</div>
 