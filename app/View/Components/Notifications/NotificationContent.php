<?php

namespace App\View\Components\Notifications;

use Illuminate\View\Component;

class NotificationContent extends Notification {
    public function __construct() {
        //
    }

    public function render() {
        return view('components.notifications.notification-content');
    }
}
