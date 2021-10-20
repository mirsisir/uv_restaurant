<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\OrderNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendOrderNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct($event)
    {
        $this->handle($event);
    }


    public function handle($event)
    {
//        $admins = User::whereHas('roles', function ($query) {
//            $query->where('id', 1);
//        })->get();
//
        $admins = User::query()->where('id', 1)->get();

        Notification::send($admins, new OrderNotification($event));
    }
}
