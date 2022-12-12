<?php

namespace App\Http\Livewire\Customer\Dashboard;

use App\Models\User;
use App\Models\Profile;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\withPagination;

class CustomerDashboardComponent extends Component
{
    use withPagination;

    public function render()
    {
        $customerProfile = Profile::where('customer_id',Auth::user()->id)->first();
        if(!$customerProfile)
        {
            $profile = new Profile();
            $profile->customer_id = Auth::user()->id;
            $profile->save();
        }
        $orders=Order::where('user_id',Auth::user()->id)->paginate(5);
        $user = User::find(Auth::user()->id);
        return view('livewire.customer.dashboard.customer-dashboard-component',['user'=>$user,'orders'=>$orders])->layout('layouts.base');
    }
}

