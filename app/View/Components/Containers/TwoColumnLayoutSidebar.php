<?php

namespace App\View\Components\Containers;

use Illuminate\View\Component;

class TwoColumnLayoutSidebar extends Component {
    public function __construct() {
        //
    }

    public function render() {
        return view('components.containers.two-column-layout-sidebar');
    }
}
