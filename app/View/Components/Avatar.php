<?php

namespace App\View\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Avatar extends Component
{
    public $profile;
    public $width;
    public $height;
    public $class;

    /**
     * Create a new component instance.
     *
     * @param $profile
     * @param $width
     * @param $height
     * @param $class
     */
    public function __construct($profile, $width, $height, $class)
    {

        $this->profile = $profile;
        $this->width = $width;
        $this->height = $height;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('components.avatar');
    }
}
