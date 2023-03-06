<?php

namespace App\Http\Livewire;

use App\Models\Food;
use Illuminate\Support\Facades\DB;
use LivewireUI\Modal\ModalComponent;

class SearchFood extends ModalComponent
{
    public $term = '';

    public function render()
    {
        $foods = DB::select('SELECT * FROM foods WHERE MATCH (name) AGAINST (? IN BOOLEAN MODE)', [$this->term]);
        return view('livewire.search-food', [
            'foods' => $foods,
        ]);
    }

    public function foodSelect($id)
    {
        $this->emit('foodSelected', $id);
        $this->closeModal();
    }
}
