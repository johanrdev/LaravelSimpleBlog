<?php

namespace App\View\Components\Links;

use Illuminate\View\Component;

class UnfollowLink extends Component {
    public $user;

    public function __construct($user) {
        $this->user = $user;
    }

    public function render() {
        return view('components.links.unfollow-link');
    }
}
