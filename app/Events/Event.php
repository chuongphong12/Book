<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Session\Store;
use App\Book;

class Event
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    private $session;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Store $session)
    {
        this->session = $session;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
    public function handle(ProductDetail $pView)
    {
        if (!$this->isPostViewed($pView))
        {
            $pView->increment('view');
            $this->storePost($pView);
        }
       
    }
    private function isPostViewed($pView)
    {
        $viewed = $this->session->get('viewed_posts', []);

        return array_key_exists($pView->id, $viewed);
    }
    private function storePost($pView)
    {
        $key = 'viewed_posts.' . $pView->id;

        $this->session->put($key, time());
    }
}
