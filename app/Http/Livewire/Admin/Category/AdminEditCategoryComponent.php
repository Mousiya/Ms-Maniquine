<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditCategoryComponent extends Component
{
    use WithFileUploads;
    public $category_id;
    public $name;
    public $newname;
    public $image;
    public $newimage; 

    public function mount($category_id)
    {
        $category = Category::where('id',$category_id)->first();
        $this->category_id=$category->id;
        $this->name =$category->name;
        $this->image =$category->image;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>['required',Rule::unique('categories')->ignore($this->category_id)],
            'image'=>'required'
        ],
        [
            'unique'=> 'this category is already exit'
        ]);
        
        if($this->newimage)
        {
            $this->validateOnly($fields,[
                'newimage'=>'required'
            ]);
        }
    }
    public function updateCategory()
    {
        $this->validate([
            'name'=>['required',Rule::unique('categories')->ignore($this->category_id)],
            'image'=>'required'
        ],
        [
            'unique'=> 'this category is already exit'
        ]);
        if($this->newimage)
        {
            $this->validate([
                'newimage'=>'required'
            ]);
        }
        
        $category = Category::find($this->category_id);
        $category->name = $this->name;
        if($this->newimage)
        {
            unlink('assets/images/categories'.'/'.$category->image);
            $imageName = Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $this->newimage->storeAs('categories',$imageName);
            $category->image = $imageName;
        }
        $category->save();
        session()->flash('message','category has been updated successfully!');
        return redirect()->route('admin.categories');
    }

    public function render()
    {
        return view('livewire.admin.category.admin-edit-category-component')->layout('admin.layout');
    }
}
