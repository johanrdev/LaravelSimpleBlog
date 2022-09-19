<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageHeader extends Component {
    public function __construct() {
        //
    }

    public function render() {
        return view('components.page-header');
    }
}
