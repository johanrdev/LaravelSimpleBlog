<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class CreateComment extends Component {
    public $post;

    public function __construct($post) {
        $this->post = $post;
    }

    public function render() {
        return view('components.forms.create-comment');
    }
}
