<?php

namespace App\Http\Livewire\Customer\Dashboard;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CustomerOrderDetailsComponent extends Component
{
    public $order_id;

    public function mount($order_id)
    {
        $this->order_id=$order_id;
    }
    public function render()
    {
        $order=Order::where('user_id',Auth::user()->id)->where('id',$this->order_id)->first();
        return view('livewire.customer.dashboard.customer-order-details-component',['order'=>$order])->layout('layouts.base');
    }
}
