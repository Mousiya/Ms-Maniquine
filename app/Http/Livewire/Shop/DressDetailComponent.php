<?php

namespace App\Http\Livewire\Shop;
use App\Models\Dress;
use App\Models\Sale;
use App\Models\DressCategory;
use Livewire\Component;
use Cart;
use DB;

class DressDetailComponent extends Component
{
    public $dress_id;
    public $selected_categories=[];

    public function mount($dress_id)
    {
        $dress= Dress::where('id',$dress_id)->first();
        $this->dress_id=$dress_id;
        $this->selected_categories = explode(',',$dress->category_ids);
        $this->qty = 1;
    }

    public function store($dress_id,$dress_name, $dress_price)
    {
        Cart::instance('cart')->add($dress_id,$dress_name,$this->qty, $dress_price)->associate('App\Models\Dress');
        session()->flash('success_message','Item added in cart');
        return redirect()->route('dress.cart');
    }

    public function increaseQuantity()
    {
        $this->qty++;
    }

    public function decreaseQuantity()
    {
        if($this->qty>1)
        {
            $this->qty--;
        }
    }

    public function render()
    {
        $dress = Dress::where('id',$this->dress_id)->first();
        $cdress=DressCategory::where('dress_id',$this->dress_id)->first();
        $popular_dresses = Dress::inRandomOrder()->limit(4)->get();
        
        $d_cats = explode(',',$dress->category_ids);
        foreach($d_cats as $cats)
        {
            $related_dresses = DB::table('dress_categories')
            ->join('dresses','dress_categories.dress_id','=','dresses.id')
            ->join('categories','dress_categories.category_id','=','categories.id')
            ->select('dresses.name','dresses.regular_price','dresses.sale_price','dresses.image','dresses.images','categories.id',)
            ->where('dress_categories.category_id',$cats)->inRandomOrder()->limit(5)->get();
        }
        //$related_dresses = Dress::where('category_id',$dress->category_id)->inRandomOrder()->limit(5)->get();
        $sale=Sale::find(1);
        return view('livewire.shop.dress-detail-component',['dress'=>$dress,'popular_dresses'=>$popular_dresses,'related_dresses'=>$related_dresses,'sale'=>$sale])->layout('layouts.base');
    }
    
}
