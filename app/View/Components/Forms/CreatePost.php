<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class CreatePost extends Component {
    public function __construct() {
        //
    }

    public function render() {
        return view('components.forms.create-post');
    }
}
