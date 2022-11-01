<?php

namespace App\Http\Livewire\Customer\Dashboard;

use Livewire\Component;

class CustomerWishlistComponent extends Component
{
    public function render()
    {
        return view('livewire.customer.dashboard.customer-wishlist-component')->layout('layouts.base');
    }
}
