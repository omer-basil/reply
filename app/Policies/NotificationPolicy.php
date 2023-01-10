<?php

namespace App\Policies;

use App\Models\User;
use App\Notifications\CommentNotification;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Notifications\DatabaseNotification;

class NotificationPolicy
{
    use HandlesAuthorization;

    const MARK_AS_READ = 'markAsRead';
    
    public function markAsRead(User $user, DatabaseNotification $notification): bool
    {
        return $notification->notifiable()->is($user);
        
    }
}
