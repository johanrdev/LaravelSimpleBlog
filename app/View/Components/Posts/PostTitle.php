<?php

namespace App\View\Components\Posts;

use Illuminate\View\Component;

class PostTitle extends Component
{
    public $post;
    public $isLink;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($post, $isLink)
    {
        $this->post = $post;
        $this->isLink = $isLink;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.posts.post-title');
    }
}
