<?php

namespace App\Http\Livewire\Menus;

use App\Models\Food;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $name = '';
    public Collection $foods;

    protected $listeners = 'foodSelected';

    protected $rules = [
        'foods.*.quantity' => 'required',
    ];

    public function mount()
    {
        $this->foods = Collection::empty();
    }

    public function render()
    {
        return view('livewire.menus.create');
    }

    public function foodSelected($id)
    {
        $this->foods->push(Food::find($id));
    }

    public function removeFood($key)
    {
        $this->foods->pull($key);
    }

    public function submit()
    {
        $menu = new Menu;
        $menu->user_id = Auth::id();
        $menu->name = $this->name;
        $menu->save();

        // $menu->foods()->saveMany($this->foods);
        foreach ($this->foods as $food) {
            $menu->foods()->attach($food, ["quantity" => $food->quantity]);
        }

        return to_route('menus.index');
    }
}
