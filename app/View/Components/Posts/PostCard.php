<?php

namespace App\View\Components\Posts;

use Illuminate\View\Component;

class PostCard extends Component
{
    public $title;
    public $body;
    public $date;
    public $categories;
    public $user;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $body, $date, $categories, $user)
    {
        $this->title = $title;
        $this->body = $body;
        $this->date = $date;
        $this->categories = $categories;
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.posts.post-card');
    }
}
