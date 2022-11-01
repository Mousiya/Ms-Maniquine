<?php

namespace App\Http\Livewire\Admin\Coupon;

use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Models\Coupon;

class AdminEditCouponComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $coupon_id;
    public $expiry_date;
    
    public function mount($coupon_id)
    {
        $coupon = Coupon::where('id',$coupon_id)->first();
        $this->coupon_id=$coupon->id;
        $this->code =$coupon->code;
        $this->type =$coupon->type;
        $this->value =$coupon->value;
        $this->cart_value =$coupon->cart_value;
        $this->expiry_date =$coupon->expiry_date;

    }
    
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'code'=>['required',Rule::unique('coupons')->ignore($this->coupon_id)],
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


    public function UpdateCoupon()
    {
        $this->validate([
            'code'=>['required',Rule::unique('coupons')->ignore($this->coupon_id)],
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
            'expiry_date'=>'required'
        ],
        [
            'unique'=> 'This coupon is already exit',
            'numeric'=> 'This is numeric value'
        ]);

        $coupon = Coupon::find($this->coupon_id);
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
        return view('livewire.admin.coupon.admin-edit-coupon-component')->layout('admin.layout');
    }
}
