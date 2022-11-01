<?php

namespace App\Http\Livewire\Admin\Homecategory;

use App\Models\Category;
use App\Models\HomeCategory;
use Livewire\Component;

class AdminHomeCategoryComponent extends Component
{
    public $select_categories;
    public $selected_categories=[];
    
    public $numberofdresses;
    public function mount()
    {
        $category=HomeCategory::find(1);
        $this->selected_categories = explode(',',$category->select_categories);
        $this->numberofdresses = $category->no_of_dresses;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'selected_categories'=>'required',
            'numberofdresses'=>'required' 
        ]);
    }
    public function updateHomeCategory()
    {
        $this->validate([
            'selected_categories'=>'required',
            'numberofdresses'=>'required'
        ]);
        $category = HomeCategory::find(1);
        $category->select_categories = implode(',',$this->selected_categories);
        $category->no_of_dresses = $this->numberofdresses;
        $category->save();
        session()->flash('message','Home category has been created successfully!');
    }

    public function render()
    {
        $categories=Category::all();
        return view('livewire.admin.homecategory.admin-home-category-component',['categories'=>$categories])->layout('admin.layout');
    }
}
