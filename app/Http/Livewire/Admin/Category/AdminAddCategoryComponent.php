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
    public $slug;
    public $description;
    public $status;
    public $image;

    public function generateSlug()
    {
        $this->slug=Str::slug($this->name,'-');
    }
    public function addCategory()
    {
        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->description = $this->description;
        $category->status = $this->status;
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
