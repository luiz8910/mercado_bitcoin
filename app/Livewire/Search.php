<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

class Search extends Component
{
    public $search = '';
    public $users = [];
    public $sortOrder = 'ASC';
    public $orderBy = 'name';

    #[Title('Search')]
    public function render()
    {
        if($this->search != ""){
            $this->users = User::where('name', 'like', '%' . $this->search . '%')
                ->orderBy($this->orderBy, $this->sortOrder)
                ->get();
        }
        else{
            $this->users = [];
        }

        return view('livewire.search');
    }
}
