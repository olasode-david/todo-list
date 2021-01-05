<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Groupname;

class Searchgrouptodo extends Component
{
    public $search = '';

    
    public function render()
    {
        return view('livewire.searchgrouptodo',[
            'groupname' => Groupname::where('gname', $this->search)->get(),
        ]);
    }
}
