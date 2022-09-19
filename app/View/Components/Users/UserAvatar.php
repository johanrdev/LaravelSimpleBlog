<?php

namespace App\View\Components\Users;

use Illuminate\View\Component;

class UserAvatar extends Component {
    public $user;
    public $isLarge;

    public function __construct($user, $isLarge = false) {
        $this->user = $user;
        $this->isLarge = $isLarge;
    }

    public function render() {
        return view('components.users.user-avatar');
    }
}
