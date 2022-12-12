<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Dress;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Models\DressSize;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\DressCategory;

class AdminAddNewProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $stock_status;
    public $image;
    public $images;
    public $sizechart;

    public $category_ids;
    public $selected_categories=[];

    public $dress_sizes;
    public $color;
    public $size;
    
    public $dress_id;
    public $color_id;
    public $size_id;
    public $qty;

    protected $rules=[
        'dress_sizes.*.color_id'=>'required',
        'dress_sizes.*.size_id'=>'required',
        'dress_sizes.*.qty'=>'required'
    ];

    public function mount()
    {
        $this->stock_status='instock';
        $dress_id=$this->dress_id;
        $dress= Dress::where('id',$dress_id)->first();
       
        $this->dress_sizes=DressSize::all()->where('dress_id',$dress_id);
        
    }

    public function add()
    {
        $this->dress_sizes->push(new DressSize());
    }



    public function render()
    {
        $categories=Category::all();
        $colors=Color::all();
        $sizes=Size::all();
        return view('livewire.admin.product.admin-add-new-product-component',['categories'=>$categories,'colors'=>$colors,'sizes'=>$sizes])->layout('admin.layout');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>'required|unique:dresses,name',
            'description'=>'required',
            'regular_price'=>'required',
            'stock_status'=>'required',
            'image'=>'required',
            'selected_categories'=>'required',
           
        ],
        [
            'unique'=> 'this category is already exit'
        ]
    );
    }

    public function remove($key)
    {
        $dress_size=$this->dress_sizes[$key];
        $this->dress_sizes->forget($key);

        $dress_size->delete();

        session()->flash('success','The data has been deleted successfully.');
    }

    public function addProduct()
    {
        $this->validate([
            'name'=>'required|unique:dresses,name',
            'description'=>'required',
            'regular_price'=>'required',
            'stock_status'=>'required',
            'image'=>'required',
            'selected_categories'=>'required',
        ],
        [
            'unique'=> 'this category is already exit'
        ]
        );
        $dress = new Dress();
        $dress->name = $this->name;
        $dress->short_description = $this->short_description;
        $dress->description = $this->description;
        $dress->regular_price = $this->regular_price;
        $dress->sale_price = $this->sale_price;
        $dress->stock_status = $this->stock_status;
       
        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('dresses',$imageName);
        $dress->image = $imageName; 
        
        if($this->images)
        {
            $imagesname='';
            foreach($this->images as $key=>$image)
            {
                $imgName = Carbon::now()->timestamp.$key. '.' . $this->image->extension();
                $image->storeAs('dresses',$imgName);
                $imagesname = $imagesname . ','.$imgName;
            }
            $dress->images=$imagesname;
        }

        $sizeChartImage = Carbon::now()->timestamp. '.' . $this->sizechart->extension();
        $this->sizechart->storeAs('sizechart',$sizeChartImage);
        $dress->sizechart = $sizeChartImage;
        
        $dress->category_ids = implode(',',$this->selected_categories);
        $d_cats = explode(',',$dress->category_ids);
        $dress->save();
        foreach($d_cats as $cats)
        {
            $dcategory = new DressCategory();
            $dcategory->dress_id=$dress->id;
            $dcategory->category_id=$cats;
            $dcategory->save();
        }

        foreach($this->dress_sizes as $dress_size){
            $dress_size->dress_id=$dress->id;
            $dress_size->save();
        }

        
        session()->flash('message','product has been created successfully!');
    }
}
