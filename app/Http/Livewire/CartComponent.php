<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Coupon;
use Carbon\Carbon;
use Cart;
use Illuminate\Support\Facades\Auth;


class CartComponent extends Component
{
    public $haveCouponCode;
    public $couponCode;
    public $discount;
    public $totalAfterDiscount;

    public function increaseQuantity($rowId)
    {
        $dress = Cart::instance('cart')->get($rowId);
        $qty = $dress->qty+1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent');
    }
    public function decreaseQuantity($rowId)
    {
        $dress = Cart::instance('cart')->get($rowId);
        $qty = $dress->qty-1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent');
    }

    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message','Item have been removed');
    }

    public function destroyAll()
    {
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message','All Item have been removed');
    }

    public function switchToSaveForLater($rowId)
    {
        $item = Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        cart::instance('saveForLater')->add($item->id,$item->name,1,$item->price)->associate('App\Models\dress');
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message','Item has been saved for later');
    }

    public function moveToCart($rowId)
    {
        $item = Cart::instance('saveForLater')->get($rowId);
        Cart::instance('saveForLater')->remove($rowId);
        cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\dress');
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('s_success_message','Item has been move to cart');
    }

    public function deleteFromSaveForLater($rowId)
    {
        Cart::instance('saveForLater')->remove($rowId);
        session()->flash('s_success_message','Item has been removed from save for later');
    }

    public function applyCouponCode()
    {
        $coupon= Coupon::where('code',$this->couponCode)->where('expiry_date','>=',Carbon::today())->where('cart_value','<=',Cart::instance('cart')->subtotal())->first();
        if(!$coupon){
            session()->flash('coupon_message','Coupon code is invalid!');
            return;
        }
        session()->put('coupon',[
            'code'=>$coupon->code,
            'type'=>$coupon->type,
            'value'=>$coupon->value,
            'cart_value'=>$coupon->cart_value
        ]);
    }

    public function calculateDiscounts()
    {
        if(session()->has('coupon'))
        {
            if(session()->get('coupon')['type']=='fixed')
            {
                $this->discount=session()->get('coupon')['value'];
            }
            else
            {
                $this->discount=(Cart::instance('cart')->subtotal()*session()->get('coupon')['value'])/100;
            }
            $this->totalAfterDiscount = Cart::instance('cart')->subtotal() - ($this->discount);
        }
    }
    public function removeCoupon()
    {
        session()->forget('coupon');
    }

    public function checkout()
    {
        if(Auth::check())
        {
            return redirect()->route('checkout');
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function setAmountForCheckout()
    {
        if(!Cart::instance('cart')->count()>0)
        {
            session()->forget('checkout');
            return;
        }

        if(session()->has('coupon'))
        {
            session()->put('checkout',[
                'subtotal'=>Cart::instance('cart')->subtotal(),
                'discount'=>$this->discount,
                'total'=>$this->totalAfterDiscount,

            ]);
        }
        else
        {
            session()->put('checkout',[
                'subtotal'=>Cart::instance('cart')->subtotal(),
                'discount'=>0,
                'total'=>Cart::instance('cart')->total()
            ]);

        }
    }

   

    public function render()
    {
        if(session()->has('coupon'))
        {
            if(Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value'])
            {
                session()->forget('coupon');
            }
            else
            {
                $this->calculateDiscounts();
            }
        }
        $this->setAmountForCheckout();

        if(Auth::check())
        {
            Cart::instance('cart')->store(Auth::user()->email);
        }

        return view('livewire.cart-component')->layout('layouts.base');
    }
}
