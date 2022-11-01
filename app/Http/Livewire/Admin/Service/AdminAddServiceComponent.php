<?php

namespace App\Http\Livewire\Admin\Service;

use App\Models\ServiceCategory;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddServiceComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $description;
    public $image;

    public function mount()
    {
        //
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>'required|unique:service_categories,name',
            'description'=>'required',
            'image'=>'required'
        ],
        [
            'unique'=> 'this category is already exit'
        ]);
    }
    public function addService()
    {
        $this->validate([
            'name'=>'required|unique:service_categories,name',
            'description'=>'required',
            'image'=>'required'
        ],
        [
            'unique'=> 'this category is already exit'
        ]);
        $category = new ServiceCategory();
        $category->name = $this->name;
        $category->description = $this->description;
        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('services',$imageName);
        $category->image = $imageName;
        $category->save();
        session()->flash('message','category has been created successfully!');
    }
    public function render()
    {
        return view('livewire.admin.service.admin-add-service-component')->layout('admin.layout');
    }
}
