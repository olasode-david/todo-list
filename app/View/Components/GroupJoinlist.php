<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GroupJoinlist extends Component
{      
    public $outs;
    public $looks;
    public $takes;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($outs, $looks, $takes)
    {
        $this->outs = $outs;
        $this->looks = $looks;
        $this->takes = $takes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.group-joinlist');
    }
}
