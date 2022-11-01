<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Dress;
use Livewire\withPagination;
use Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class ShopComponent extends Component
{
    public $sorting;
    public $pagesize;

    
    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
    }

    public function store($dress_id,$dress_name, $dress_price)
    {
        Cart::instance('cart')->add($dress_id,$dress_name,1, $dress_price)->associate('App\Models\Dress');
        session()->flash('success_message','Item added in cart');
        return redirect()->route('dress.cart');
    }
    
    public function addToWishlist($dress_id,$dress_name, $dress_price)
    {
        Cart::instance('wishlist')->add($dress_id,$dress_name,1, $dress_price)->associate('App\Models\Dress');
        $this->emitTo('wishlist-count-component','refreshComponent');
    }


    public function removeFromWishlist($dress_id)
    {
        foreach(Cart::instance('wishlist')->content()as $wishitem)
        {
            if($wishitem->id == $dress_id)
            {
                Cart::instance('wishlist')->remove($wishitem->rowId);
                $this->emitTo('wishlist-count-component','refreshComponent');
                return;
            }
        }
    }

    use withPagination;
    public function render()
    {
        if($this->sorting=='date')
        {
            $dresses =Dress::orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting=='price')
        {
            $dresses =Dress::orderBy('regular_price','ASC')->paginate($this->pagesize);
        }
        else if($this->sorting=='price-desc')
        {
            $dresses =Dress::orderBy('regular_price','DESC')->paginate($this->pagesize);
        }
        else
        {
            $dresses =Dress::paginate($this->pagesize);
        }
        $categories=Category::all();

        if(Auth::check())
        {
            Cart::instance('cart')->store(Auth::user()->email);
        }

        $popular_dresses = Dress::inRandomOrder()->limit(4)->get();
        return view('livewire.shop-component',['dresses'=> $dresses, 'categories'=>$categories , 'popular_dresses'=>$popular_dresses])->layout('layouts.base');
    }
}
