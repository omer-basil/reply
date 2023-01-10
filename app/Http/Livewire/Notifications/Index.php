<?php

namespace App\Http\Livewire\Notifications;

use Livewire\Component;
use App\Policies\NotificationPolicy;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Notifications\DatabaseNotification;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use AuthorizesRequests;
    use WithPagination;

    public $notificationId;

    public function render()
    {
        return view('livewire.notifications.index', [
            'notifications' => Auth::user()->unreadNotifications()->paginate(10),
        ]);
    }

    public function getNotificationProperty(): DatabaseNotification
    {
        return DatabaseNotification::findOrFail($this->notificationId);
    }

    public function markAsRead(String $notificationId)
    {
        $this->notificationId = $notificationId;

        // $this->authorize(NotificationPolicy::MARK_AS_READ, $this->notificationId); //need to be fixed!

        $this->notification->markAsRead();

        $this->emit('markedAsRead', Auth::user()->unreadNotifications()->count());
    }
}
