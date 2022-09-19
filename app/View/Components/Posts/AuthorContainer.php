<?php

namespace App\View\Components\Posts;

use Illuminate\View\Component;

class AuthorContainer extends Component {
    public function __construct() {
        //
    }

    public function render() {
        return view('components.posts.author-container');
    }
}
