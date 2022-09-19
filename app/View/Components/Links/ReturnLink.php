<?php

namespace App\View\Components\Links;

use Illuminate\View\Component;

class ReturnLink extends Component {
    public function __construct() {
        //
    }

    public function render() {
        return view('components.links.return-link');
    }
}
