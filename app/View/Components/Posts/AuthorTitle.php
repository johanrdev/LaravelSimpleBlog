<?php

namespace App\View\Components\Posts;

use Illuminate\View\Component;

class AuthorTitle extends Component {
    public function __construct() {
        //
    }

    public function render() {
        return view('components.posts.author-title');
    }
}
