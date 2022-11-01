<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\Shipping;
use App\Models\Transaction;
use Cart;
use illuminate\Support\Facades\Auth;
use Livewire\Component;

class CheckoutComponent extends Component
{
    public $ship_to_different;
    
    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $line1;
    public $line2;
    public $city;
    public $province;

    public $s_firstname;
    public $s_lastname;
    public $s_email;
    public $s_mobile;
    public $s_line1;
    public $s_line2;
    public $s_city;
    public $s_province;

    public $paymentmode;
    public $thankyou;

    public function mount()
    {
        $user = User::find(Auth::user()->id);
        $this->email = $user->email;
        $this->s_email = $user->email;
        $this->mobile = $user->profile->mobile;
        $this->s_mobile = $user->profile->mobile;
        $this->line1 = $user->profile->line1;
        $this->line2 = $user->profile->line2;
        $this->province = $user->profile->province;
        $this->city = $user->profile->city;

        

    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email',
            'mobile'=>'required',
            'line1'=>'required',
            'line2'=>'required',
            'city'=>'required',
            'province'=>'required',
            'paymentmode'=>'required'
        ]);

        if($this->ship_to_different)
        {
            $this->validateOnly($fields,[
                's_firstname'=>'required',
                's_lastname'=>'required',
                's_email'=>'required|email',
                's_mobile'=>'required',
                's_line1'=>'required',
                's_line2'=>'required',
                's_city'=>'required',
                's_province'=>'required'
            ]);
        }
    }

    public function placeOrder()
    {
        $this->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email',
            'mobile'=>'required',
            'line1'=>'required',
            'line2'=>'required',
            'city'=>'required',
            'province'=>'required',
            'paymentmode'=>'required'
        ]);
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal=session()->get('checkout')['subtotal'];
        
        $order->discount=session()->get('checkout')['discount'];
        $order->total=session()->get('checkout')['total'];

        $order->firstname=$this->firstname;
        $order->lastname=$this->lastname;
        $order->email=$this->email;
        $order->mobile=$this->mobile;
        $order->line1=$this->line1;
        $order->line2=$this->line2;
        $order->city=$this->city;
        $order->province=$this->province;
        $order->status='ordered';
        $order->is_shipping_different=$this->ship_to_different ? 1:0;
        $order->save();

        foreach(Cart::instance('cart')->content() as $item)
        {
            $orderitem = new OrderDetail();
            $orderitem->dress_id = $item->id;
            $orderitem->order_id=$order->id;
            $orderitem->price=$item->price;
            $orderitem->quantity=$item->qty;
            $orderitem->save();
        }

        if($this->ship_to_different)
        {
            $this->validate([
                's_firstname'=>'required',
                's_lastname'=>'required',
                's_email'=>'required|email',
                's_mobile'=>'required',
                's_line1'=>'required',
                's_line2'=>'required',
                's_city'=>'required',
                's_province'=>'required'
            ]);
            $shipping= new Shipping();
            $shipping->order_id=$order->id;
            $shipping->firstname=$this->s_firstname;
            $shipping->lastname=$this->s_lastname;
            $shipping->email=$this->s_email;
            $shipping->mobile=$this->s_mobile;
            $shipping->line1=$this->s_line1;
            $shipping->line2=$this->s_line2;
            $shipping->city=$this->s_city;
            $shipping->province=$this->s_province;
            $shipping->save();
        }

        $shipping= new Shipping();
        $shipping->order_id=$order->id;
        $shipping->firstname=$this->firstname;
        $shipping->lastname=$this->lastname;
        $shipping->email=$this->email;
        $shipping->mobile=$this->mobile;
        $shipping->line1=$this->line1;
        $shipping->line2=$this->line2;
        $shipping->city=$this->city;
        $shipping->province=$this->province;
        $shipping->save();


        if($this->paymentmode =='cash on delivery')
        {
            $transaction=new Transaction();
            $transaction->user_id= Auth::user()->id;
            $transaction->order_id=$order->id;
            $transaction->mode='cash on delivery';
            $transaction->status='pending';
            $transaction->save();
        }

        $this->thankyou =1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');

    }

    public function verifyForCheckout()
    {
        if(Auth::check())
        {
            return redirect()->route('login');
        }
        elseif($this->thankyou)
        {
            return redirect()->route('thankyou');
        }
        elseif(!session()->get('checkout'))
        {
            return redirect()->route('product.cart');
        }
    }
    
    public function render()
    {
        //$this->verifyForCheckout();
        return view('livewire.checkout-component')->layout('layouts.base');
    }
}
