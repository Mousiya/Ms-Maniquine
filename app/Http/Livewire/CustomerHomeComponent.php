<?php

namespace App\Http\Livewire;

use App\Models\HomeSlider;
use App\Models\HomeCategory;
use App\Models\Dress;
use App\Models\Category;
use Livewire\Component;
use App\Models\Sale;
use Cart;
use Illuminate\Support\Facades\Auth;

class CustomerHomeComponent extends Component
{
    public function render()
    {
        $sliders =HomeSlider::where('status',1)->get();
        $dresses = Dress::orderBy('created_at','DESC')->get()->take(8);
        $category = HomeCategory::find(1);
        $cats = explode(',',$category->select_categories);
        $categories = Category::whereIn('id',$cats)->get();
        $no_of_dresses = $category->no_of_dresses;
        $ddresses = Dress::where('sale_price','>',0)->inRandomOrder()->get()->take(8);
        $sale=sale::find(1);
        if(Auth::check())
        {
            Cart::instance('cart')->restore(Auth::user()->email);
        }
        return view('livewire.customer-home-component',['sliders'=>$sliders,'dresses'=>$dresses,'categories'=>$categories,'no_of_dresses'=>$no_of_dresses,'ddresses'=>$ddresses,'sale'=>$sale])->layout('layouts.base');
    }
}
