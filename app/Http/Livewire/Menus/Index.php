<?php

namespace App\Http\Livewire\Menus;

use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $menus;

    public function mount()
    {
        $this->menus = Menu::where('user_id', Auth::id())->get();
    }

    public function render()
    {
        return view('livewire.menus.index');
    }
}
