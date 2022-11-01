<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class WishlistComponent extends Component
{
    public function removeFromWishlist($dress_id)
    {
        foreach(Cart::instance('wishlist')->content() as $wishitem)
        {
            if($wishitem->id == $dress_id)
            {
                Cart::instance('wishlist')->remove($wishitem->rowId);
                $this->emitTo('wishlist-count-component','refreshComponent');
                return;
            }
        }
    }

    public function moveProductFromWishlistToCart($rowId)
    {
        $item = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Dress');
        $this->emitTo('wishlist-count-component','refreshComponent');
        $this->emitTo('cart-count-component','refreshComponent');
    }
    
    public function render()
    {
        return view('livewire.wishlist-component')->layout('layouts.base');
    }
    
}
