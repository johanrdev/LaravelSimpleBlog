<?php

namespace App\View\Components\Containers;

use Illuminate\View\Component;

class Container extends Component {
    public function __construct() {
        //
    }

    public function render() {
        return view('components.containers.container');
    }
}
