<?php

namespace App\View\Components\Posts;

use Illuminate\View\Component;

class PostMetaHeader extends Component {
    public function __construct() {
        //
    }

    public function render() {
        return view('components.posts.post-meta-header');
    }
}
