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

class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $dress_id;
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
        $this->dress_id = $dress->id;
        $this->dress_sizes=DressSize::all()->where('dress_id',$dress->id);
    }

    public function add()
    {

        $this->dress_sizes->push(new DressSize());
    }

    public function render()
    {
        $dresses=Dress::all();
        $colors=Color::all();
        $sizes=Size::all();
        return view('livewire.admin.product.admin-add-product-component',['dresses'=>$dresses,'colors'=>$colors,'sizes'=>$sizes])->layout('admin.layout');
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
        $this->validate();
        foreach($this->dress_sizes as $dress_size){
            $dress_size->dress_id=$dress->id;
            $dress_size->save();
        }

        session()->flash('message','product has been updated successfully!');
    }
}
