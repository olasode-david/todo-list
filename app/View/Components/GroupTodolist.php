<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GroupTodolist extends Component
{
    public $lists;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($lists)
    {
        $this->lists = $lists;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.group-todolist');
    }
}
