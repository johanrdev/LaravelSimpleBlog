<?php

namespace App\View\Components\Containers;

use Illuminate\View\Component;

class TwoColumnLayoutContainer extends Component {
    public function __construct() {
        //
    }

    public function render() {
        return view('components.containers.two-column-layout-container');
    }
}
