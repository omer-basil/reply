<?php

namespace App\Http\Livewire\Notifications;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class Indicator extends Component
{
    public $hasNotifications;

    protected $listeners = [
        'markedAsRead' => 'setHasNotifications',
    ];

    public function render(): View
    {
        $this->hasNotifications = $this->setHasNotifications(
            Auth::user()->unreadNotifications()->count()
        );

        return view('livewire.notifications.indicator', [
            'hasNotifications' => $this->hasNotifications,
        ]);
    }

    public function setHasNotifications(int $count): bool
    {
        return $count > 0;

        $this->emit('markedAsRead', Auth::user()->unreadNotifications()->count());
    }
}
