<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GroupOwnerlist extends Component
{
    public $groupName;
    public $groupTodo;
    public $outs;
    public $lists;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $groupName, $groupTodo, $outs, $lists)
    {
        $this->groupName = $groupName;
        $this->groupTodo = $groupTodo;
        $this->outs = $outs;
        $this->lists = $lists;
       
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.group-ownerlist');
    }
}
