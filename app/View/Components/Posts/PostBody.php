<?php

namespace App\View\Components\Posts;

use Illuminate\View\Component;

class PostBody extends Component {
    public $post;
    public $isExcerpt;
    
    public function __construct($post, $isExcerpt) {
        $this->post = $post;
        $this->isExcerpt = $isExcerpt;
    }

    public function render() {
        return view('components.posts.post-body');
    }
}
