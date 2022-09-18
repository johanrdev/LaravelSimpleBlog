<?php

namespace App\View\Components\Users;

use Illuminate\View\Component;

class UserAvatar extends Component
{
    public $user;
    public $isLarge;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($user, $isLarge = false)
    {
        $this->user = $user;
        $this->isLarge = $isLarge;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.users.user-avatar');
    }
}
