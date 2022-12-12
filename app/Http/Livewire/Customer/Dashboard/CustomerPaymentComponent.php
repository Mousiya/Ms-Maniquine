<?php

namespace App\Http\Livewire\Customer\Dashboard;

use Livewire\Component;

class CustomerPaymentComponent extends Component
{
    public function render()
    {
        return view('livewire.customer.dashboard.customer-payment-component')->layout('layouts.base');
    }
}
