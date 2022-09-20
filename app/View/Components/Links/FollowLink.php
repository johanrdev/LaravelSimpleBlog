<?php

namespace App\View\Components\Links;

use Illuminate\View\Component;

class FollowLink extends Component {
    public $user;
    
    public function __construct($user) {
        $this->user = $user;
    }

    public function render() {
        return view('components.links.follow-link');
    }
}
