<?php

namespace App\View\Components\Containers;

use Illuminate\View\Component;

class InnerContainer extends Component {
    public function __construct() {
        //
    }

    public function render() {
        return view('components.containers.inner-container');
    }
}
