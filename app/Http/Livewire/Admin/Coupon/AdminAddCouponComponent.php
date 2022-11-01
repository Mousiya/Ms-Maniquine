<?php

namespace App\Http\Livewire\Admin\Coupon;

use App\Models\Coupon;
use Livewire\Component;

class AdminAddCouponComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $expiry_date;
    
    public function mount()
    {
        $this->type='fixed';
    }
    
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'code'=>'required|unique:coupons',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
            'expiry_date'=>'required'
        ],
        [
            'unique'=> 'This coupon is already exit',
            'numeric'=> 'This is numeric value'
        ]);
    }


    public function addCoupon()
    {
        $this->validate([
            'code'=>'required|unique:coupons',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
            'expiry_date'=>'required'
        ],
        [
            'unique'=> 'This coupon is already exit',
            'numeric'=> 'This is numeric value'
        ]);

        $coupon = new Coupon();
        $coupon->code = $this ->code;
        $coupon->type = $this ->type;
        $coupon->value = $this ->value;
        $coupon->cart_value = $this ->cart_value;
        $coupon->expiry_date = $this ->expiry_date;
        $coupon->save();
        session()->flash('message','coupon has been created successfully!');

    }
    public function render()
    {
        return view('livewire.admin.coupon.admin-add-coupon-component')->layout('admin.layout');
    }
}
