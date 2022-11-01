<?php

namespace App\Http\Livewire\Customer\Dashboard;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CustomerProfileComponent extends Component
{
    public function render()
    {
        $customerProfile = Profile::where('customer_id',Auth::user()->id)->first();
        if(!$customerProfile)
        {
            $profile = new Profile();
            $profile->customer_id = Auth::user()->id;
            $profile->save();
        }
        $user = User::find(Auth::user()->id);
        return view('livewire.customer.dashboard.customer-profile-component',['user'=>$user])->layout('layouts.base');
        
        
    }
}
