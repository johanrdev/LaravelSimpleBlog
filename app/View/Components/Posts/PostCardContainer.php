<?php

namespace App\View\Components\Posts;

use Illuminate\View\Component;

class PostCardContainer extends Component {
    public function __construct() {
        //
    }

    public function render() {
        return view('components.posts.post-card-container');
    }
}
