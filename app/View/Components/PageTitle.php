<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageTitle extends Component {
    public function __construct() {
        //
    }

    public function render() {
        return view('components.page-title');
    }
}
