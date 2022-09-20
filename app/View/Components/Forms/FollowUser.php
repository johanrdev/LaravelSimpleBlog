<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class FollowUser extends Component {
    public $user;

    public function __construct($user) {
        $this->user = $user;
    }

    public function render() {
        return view('components.forms.follow-user');
    }
}
