<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Dress;
use App\Models\Color;
use App\Models\Size;
use App\Models\Category;
use App\Models\DressCategory;
use App\Models\DressSize;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $stock_status;
    public $images;
    public $image;
   
    public $category_ids;
    public $selected_categories=[];

    public $sizechart;
    public $newsizechart;

    public $newimage;
    public $newimages;
    public $dress_id;

    public $category_id;

    public $dress_sizes;
    public $color;
    public $size;
    
    protected $rules=[
        'dress_sizes.*.color_id'=>'required',
        'dress_sizes.*.size_id'=>'required',
        'dress_sizes.*.qty'=>'required'
    ];

    public function mount($dress_id)
    {
        $dress= Dress::where('id',$dress_id)->first();
        
        $this->name = $dress->name; 
        $this->short_description = $dress->short_description;
        $this->description = $dress->description;
        $this->regular_price = $dress->regular_price;
        $this->sale_price = $dress->sale_price;
        $this->stock_status = $dress->stock_status;
        $this->image = $dress->image;
        $this->sizechart = $dress->sizechart;
        $this->images=explode(",",$dress->images);
        $this->selected_categories= explode(",",$dress->category_ids);
        $this->dress_id = $dress->id;

        $this->dress_sizes=DressSize::all()->where('dress_id',$dress->id);
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
        return view('livewire.admin.product.admin-edit-product-component',['categories'=>$categories,'colors'=>$colors,'sizes'=>$sizes])->layout('admin.layout');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>['required',Rule::unique('dresses')->ignore($this->dress_id)],
            'description'=>'required',
            'regular_price'=>'required',
            'stock_status'=>'required',
            'image'=>'required',
            'selected_categories'=>'required',
            
        ],
        [
            'unique'=> 'this dress is already exit'
        ]
        );
        if($this->newimage)
        {
            $this->validateOnly($fields,[
                'newimage'=>'required'
            ]);
        }
    }

    public function remove($key)
    {
        $dress_size=$this->dress_sizes[$key];
        $this->dress_sizes->forget($key);

        $dress_size->delete();

        session()->flash('success','The data has been deleted successfully.');
    }

    public function updateProduct()
    {
        $this->validate([
            'name'=>['required',Rule::unique('dresses')->ignore($this->dress_id)],
            'description'=>'required',
            'regular_price'=>'required',
            'stock_status'=>'required',
            'image'=>'required',
            'selected_categories'=>'required',
        ],
        [
            'unique'=> 'this dress is already exit'
        ]);
        if($this->newimage)
        {
            $this->validate([
                'newimage'=>'required'
            ]);
        }
        
        $dress = Dress::find($this->dress_id);
        $dress->name = $this->name;
        $dress->short_description = $this->short_description;
        $dress->description = $this->description;
        $dress->regular_price = $this->regular_price;
        $dress->sale_price = $this->sale_price;
        $dress->stock_status = $this->stock_status;
        if($this->newimage)
        {
            unlink('assets/images/dresses'.'/'.$dress->image);
            $imageName = Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $this->newimage->storeAs('dresses',$imageName);
            $dress->image = $imageName;
        }

        if($this->newimages)
        {
            if($dress->images)
            {
                $images=explode(",",$dress->images);
                foreach($images as $image)
                {
                    if($image)
                    {
                        unlink('assets/images/dresses'.'/'.$image);
                    }
                }
            }
                $imagesname='';
                foreach($this->newimages as $key=>$image)
                {
                    $imgName = Carbon::now()->timestamp. $key.'.' . $image->extension();
                    $image->storeAs('dresses',$imgName);
                    $imagesname=$imagesname.','.$imgName;
                }
                $dress->images = $imagesname;
            
        }

        if($this->newsizechart)
        {
            unlink('assets/images/sizechart'.'/'.$dress->sizechart);
            $sizechartName = Carbon::now()->timestamp. '.' . $this->newsizechart->extension();
            $this->newsizechart->storeAs('sizechart',$sizechartName);
            $dress->sizechart = $sizechartName;
        }

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

        $this->validate();
        foreach($this->dress_sizes as $dress_size){
            $dress_size->dress_id=$dress->id;
            $dress_size->save();
        }

        session()->flash('message','product has been updated successfully!');
    }
}
