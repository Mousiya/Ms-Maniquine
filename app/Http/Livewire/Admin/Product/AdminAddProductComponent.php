<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Dress;
use App\Models\Category;
use App\Models\Colour;
use App\Models\Size;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $quantity;
    public $stock_status;
    public $image;
    public $category_id;

    public function mount()
    {
        $this->stock_status='instock';
    }
   
    public function render()
    {
        $categories=Category::all();
        $dresses=Dress::all();
        return view('livewire.admin.product.admin-add-product-component',['dresses'=>$dresses],['categories'=>$categories])->layout('admin.layout');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>'required',
            'description'=>'required',
            'regular_price'=>'required',
            'quantity'=>'required',
            'stock_status'=>'required',
            'image'=>'required',
            'category_id'=>'required'
        ]);
    }

    public function addProduct()
    {
        $this->validate([
            'name'=>'required',
            'description'=>'required',
            'regular_price'=>'required',
            'quantity'=>'required',
            'stock_status'=>'required',
            'image'=>'required',
            'category_id'=>'required'
        ]);
        $dress = new Dress();
        $dress->name = $this->name;
        $dress->short_description = $this->short_description;
        $dress->description = $this->description;
        $dress->regular_price = $this->regular_price;
        $dress->sale_price = $this->sale_price;
        $dress->stock_status = $this->stock_status;
        $dress->quantity = $this->quantity;
        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('dresses',$imageName);
        $dress->image = $imageName; 
        $dress->category_id= $this->category_id;
        $dress->save();
        session()->flash('message','product has been created successfully!');
    }
}
