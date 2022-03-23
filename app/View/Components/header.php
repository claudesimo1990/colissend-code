<?php

namespace App\View\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class header extends Component
{
    public $page;
    public $title;

    /**
     * @param $page
     * @param $title
     */
    public function __construct($page, $title)
    {
        $this->page = $page;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('components.header');
    }
}
