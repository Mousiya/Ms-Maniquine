<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;


class AdminAddCategoryComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $image;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>'required|unique:categories,name',
            'image'=>'required'
        ],
        [
            'unique'=> 'this category is already exit'
        ]
    );
    }
    public function addCategory()
    {
        $this->validate([
            'name'=>'required|unique:categories,name',
            'image'=>'required'
        ],
        [
            'unique'=> 'this category is already exit'
        ]
    );
        
        $category = new Category();
        $category->name = $this->name;
        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('categories',$imageName);
        $category->image = $imageName;
        $category->save();
        session()->flash('message','category has been created successfully!');
    }

    public function render()
    {
        return view('livewire.admin.category.admin-add-category-component')->layout('admin.layout');
    }
}
