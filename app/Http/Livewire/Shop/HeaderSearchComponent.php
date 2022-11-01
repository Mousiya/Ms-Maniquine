<?php

namespace App\Http\Livewire\Shop;

use App\Models\Category;
use Livewire\Component;

class HeaderSearchComponent extends Component
{
    public $search;
    public $dress_cat;
    public $dress_cat_id;

    public function mount()
    {
        $this->dress_cat ='All Category';
        $this->fill(request()->only('search','dress_cat','dress_cat_id'));
    }
    public function render()
    {
        $categories=Category::all();
        return view('livewire.shop.header-search-component',['categories'=>$categories]);
    }
}
