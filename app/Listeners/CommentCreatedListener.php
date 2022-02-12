<?php

namespace App\Listeners;

use App\Models\User;
use App\Models\Article;
use App\Events\CommentCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\CommentCreatedNotification;

class CommentCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(CommentCreatedEvent $event)
    {
        $article_owner = $event->data['article']->user;
        // dd($event->data);
        $article_owner->notify(new CommentCreatedNotification($event->data));
    }
}
