<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CustomerHomeComponent extends Component
{
    public function render()
    {
        return view('livewire.customer-home-component')->layout('layouts.base');
    }
}
