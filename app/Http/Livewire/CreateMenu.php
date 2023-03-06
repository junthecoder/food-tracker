<?php

namespace App\Http\Livewire;

use App\Models\Food;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CreateMenu extends Component
{
    public Collection $foods;

    protected $listeners = 'foodSelected';

    public function mount()
    {
        $this->foods = Collection::empty();
    }

    public function render()
    {
        return view('livewire.create-menu');
    }

    public function foodSelected($id)
    {
        $this->foods->push(Food::find($id));
    }
}
