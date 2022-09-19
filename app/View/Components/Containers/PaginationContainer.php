<?php

namespace App\View\Components\Containers;

use Illuminate\View\Component;

class PaginationContainer extends Component {
    public function __construct() {
        //
    }

    public function render() {
        return view('components.containers.pagination-container');
    }
}
