<?php

namespace App\View\Components\Notifications;

use Illuminate\View\Component;

class NotificationTimestamp extends Notification {
    public function __construct() {
        //
    }

    public function render(){
        return view('components.notifications.notification-timestamp');
    }
}
