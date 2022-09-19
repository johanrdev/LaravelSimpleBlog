<?php

namespace App\View\Components\Posts;

use Illuminate\View\Component;

class PostMeta extends Component {
    public $post;

    public function __construct($post) {
        $this->post = $post;
    }

    public function render() {
        return view('components.posts.post-meta');
    }
}
