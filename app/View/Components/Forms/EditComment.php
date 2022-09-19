<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class EditComment extends Component {
    public function __construct() {
        //
    }

    public function render() {
        return view('components.forms.edit-comment');
    }
}
