<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class DeleteCategory extends Component {
    public $category;

    public function __construct($category) {
        $this->category = $category;
    }

    public function render() {
        return view('components.forms.delete-category');
    }
}
