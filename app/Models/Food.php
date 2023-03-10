<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';

    public function menus()
    {
        return $this->belongsToMany(Menu::class);
    }

    public function foodUnits()
    {
        return $this->hasMany(FoodUnit::class);
    }
}
