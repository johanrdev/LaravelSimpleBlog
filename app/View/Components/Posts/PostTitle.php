<?php

namespace App\View\Components\Posts;

use Illuminate\View\Component;

class PostTitle extends Component {
    public $post;
    public $isLink;
    
    public function __construct($post, $isLink) {
        $this->post = $post;
        $this->isLink = $isLink;
    }

    public function render() {
        return view('components.posts.post-title');
    }
}
