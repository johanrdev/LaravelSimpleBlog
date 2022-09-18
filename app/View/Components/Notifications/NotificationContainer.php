<?php

namespace App\View\Components\Notifications;

use Illuminate\View\Component;

class NotificationContainer extends Notification
{
    public $source;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($source)
    {
        $this->source = $source;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.notifications.notification-container');
    }
}
