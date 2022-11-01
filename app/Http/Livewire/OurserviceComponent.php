<?php

namespace App\Http\Livewire;

use App\Models\ServiceCategory;
use Livewire\Component;


class OurserviceComponent extends Component
{
    public function render()
    {
        $categories=ServiceCategory::paginate(10);
        return view('livewire.ourservice-component',['categories'=>$categories])->layout('layouts.base');
    }
}
