<?php

namespace App\Listeners;
use App\Events\UserFollowed;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendFollowNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        Notification::create([
            'user_id' => $event->followed->id,
            'type' => 'follow',
            'data' => json_encode([
                'follower_id' => $event->follower->id,
                'follower_name' => $event->follower->name,
            ]),
        ]);
    }
}
