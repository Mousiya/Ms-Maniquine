<?php

namespace App\Http\Livewire\Shop;

use Livewire\Component;
use App\Models\Dress;
use Livewire\withPagination;
use Cart;
use App\Models\Category;

class SearchComponent extends Component
{
    public $sorting;
    public $pagesize;

    public $search;
    public $dress_cat;
    public $dress_cat_id;

    
    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->fill(request()->only('search','dress_cat','dress_cat_id'));
    }

    public function store($dress_id,$dress_name, $dress_price)
    {
        Cart::add($dress_id,$dress_name,1, $dress_price)->associate('App\Models\Dress');
        session()->flash('success_message','Item added in cart');
        return redirect()->route('dress.cart');
    }
    use withPagination;
    public function render()
    {
        if($this->sorting=='date')
        {
            $dresses =Dress::where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->dress_cat_id.'%')->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting=='price')
        {
            $dresses =Dress::where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->dress_cat_id.'%')->orderBy('regular_price','ASC')->paginate($this->pagesize);
        }
        else if($this->sorting=='price-desc')
        {
            $dresses =Dress::where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->dress_cat_id.'%')->orderBy('regular_price','DESC')->paginate($this->pagesize);
        }
        else
        {
            $dresses =Dress::where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->dress_cat_id.'%')->paginate($this->pagesize);
        }
        $categories=Category::where('status','dress')->get();
        return view('livewire.shop.search-component',['dresses'=> $dresses, 'categories'=>$categories])->layout('layouts.base');
    }
}

