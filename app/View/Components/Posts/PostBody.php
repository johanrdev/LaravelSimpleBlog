<?php

namespace App\View\Components\Posts;

use Illuminate\View\Component;

class PostBody extends Component
{
    public $post;
    public $isExcerpt;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($post, $isExcerpt)
    {
        $this->post = $post;
        $this->isExcerpt = $isExcerpt;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.posts.post-body');
    }
}
