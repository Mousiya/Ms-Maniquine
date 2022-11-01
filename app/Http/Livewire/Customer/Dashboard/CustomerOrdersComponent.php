<?php

namespace App\Http\Livewire\Customer\Dashboard;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\withPagination;

class CustomerOrdersComponent extends Component
{
    use withPagination;

    public function render()
    {
        $orders=Order::where('user_id',Auth::user()->id)->paginate(5);

        return view('livewire.customer.dashboard.customer-orders-component',['orders'=>$orders])->layout('layouts.base');
    }
}
