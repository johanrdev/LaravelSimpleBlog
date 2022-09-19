<?php

namespace App\View\Components\Notifications;

use Illuminate\View\Component;

class NotificationContainer extends Notification {
    public $source;
    
    public function __construct($source) {
        $this->source = $source;
    }

    public function render() {
        return view('components.notifications.notification-container');
    }
}
