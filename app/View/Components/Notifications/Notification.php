<?php

namespace App\View\Components\Notifications;

use Illuminate\View\Component;

class Notification extends Component {
    public $source;

    public function __construct($source) {
        $this->source = $source;
    }

    public function render() {
        return view('components.notifications.notification');
    }
}
