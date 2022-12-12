<?php

namespace App\Http\Livewire\Shop;

use Livewire\Component;
use App\Models\Dress;
use Livewire\withPagination;
use Cart;
use DB;
use App\Models\Category;

class DressCategoryComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $category_id;
    
    public function mount($category_id)
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->category_id = $category_id;
    }

    public function store($dress_id,$dress_name, $dress_price)
    {
        Cart::add($dress_id,$dress_name,1, $dress_price)->associate('App\Models\Dress');
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
        $category =Category::where('id',$this->category_id)->first();
        $category_id=$category->id;
        $category_name=$category->name;
        $category_image=$category->image;
        
        if($this->sorting=='date')
        {
            $dresses = DB::table('dress_categories')
            ->join('dresses','dress_categories.dress_id','=','dresses.id')
            ->join('categories','dress_categories.category_id','=','categories.id')
            ->select('dresses.name','dresses.regular_price','dresses.sale_price','dresses.image','dresses.images','categories.id',)
            ->where('dress_categories.category_id',$category_id)->orderBy('dresses.created_at','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting=='price')
        {
            $dresses = DB::table('dress_categories')
            ->join('dresses','dress_categories.dress_id','=','dresses.id')
            ->join('categories','dress_categories.category_id','=','categories.id')
            ->select('dresses.name','dresses.regular_price','dresses.sale_price','dresses.image','dresses.images','categories.id',)
            ->where('dress_categories.category_id',$category_id)->orderBy('regular_price','ASC')->paginate($this->pagesize);
        }
        else if($this->sorting=='price-desc')
        {
            $dresses = DB::table('dress_categories')
            ->join('dresses','dress_categories.dress_id','=','dresses.id')
            ->join('categories','dress_categories.category_id','=','categories.id')
            ->select('dresses.name','dresses.regular_price','dresses.sale_price','dresses.image','dresses.images','categories.id',)
            ->where('dress_categories.category_id',$category_id)->orderBy('regular_price','DESC')->paginate($this->pagesize);
        }
        else
        {
            $dresses = DB::table('dress_categories')
            ->join('dresses','dress_categories.dress_id','=','dresses.id')
            ->join('categories','dress_categories.category_id','=','categories.id')
            ->select('dresses.name','dresses.regular_price','dresses.sale_price','dresses.image','dresses.images','categories.id',)
            ->where('dress_categories.category_id',$category_id)->paginate($this->pagesize);
        }
        $categories=Category::all();
        $popular_dresses = Dress::inRandomOrder()->limit(4)->get();
        return view('livewire.shop.dress-category-component',['dresses'=> $dresses, 'categories'=>$categories, 'category_name'=>$category_name,'popular_dresses'=>$popular_dresses,'category_image'=>$category_image])->layout('layouts.base');
    }
}