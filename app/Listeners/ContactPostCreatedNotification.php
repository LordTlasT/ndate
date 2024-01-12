<?php

namespace App\Listeners;

use App\Events\ContactPostCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use App\Notifications\NewContactPost;

class ContactPostCreatedNotification
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
    public function handle(ContactPostCreated $event): void
    {
        foreach (User::where('is_admin', 1)->cursor() as $admin) {

            $admin->notify(new NewContactPost($event->contactPost));

        }
    }
}
