<?php

namespace App\Http\Livewire\Customer\Dashboard;

use Livewire\Component;
use App\Models\User;
use App\Models\Profile;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;


class CustomerEditProfileComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $email;
    public $mobile;
    public $image;
    public $line1;
    public $line2;
    public $province;
    public $city;
    
    public $newimage;

    public function mount()
    {
        $user = User::find(Auth::user()->id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->mobile= $user->profile->mobile;
        $this->image = $user->profile->image;
        $this->line1 = $user->profile->line1;
        $this->line2 = $user->profile->line2;
        $this->province = $user->profile->province;
        $this->city = $user->profile->city;

    }
    
    public function EditProfile()
    {
        $user = User::find(Auth::user()->id);
        $user->name = $this->name;
        $user->save();

        $user->profile->line1 = $this->line1;
        $user->profile->line2 = $this->line2;
        $user->profile->province= $this->province;
        $user->profile->city=$this->city;
        $user->profile->mobile = $this->mobile;

        if($this->newimage)
        {
            if($this->image)
            {
                unlink('assets/image/profiles'.$this->image);
            }
            $imageName = Carbon::now()->timestamp . '.' .$this->newimage->extension();
            $this->newimage->storeAs('profiles',$imageName);
            $user->profile->image = $imageName;
        }
        $user->profile->save();
        session()->Flash('message','Profile has been updated successfully!');
    }

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
        return view('livewire.customer.dashboard.customer-edit-profile-component',['user'=>$user])->layout('layouts.base');
    }
}
