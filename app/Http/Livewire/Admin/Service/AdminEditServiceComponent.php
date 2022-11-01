<?php

namespace App\Http\Livewire\Admin\Service;

use App\Models\ServiceCategory;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditServiceComponent extends Component
{

    use WithFileUploads;
    public $category_id;
    public $name;
    public $description;
    public $image;
    public $newimage; 

    public function mount($category_id)
    {
        $category = ServiceCategory::where('id',$category_id)->first();
        $this->category_id=$category->id;
        $this->name =$category->name;
        $this->description =$category->description;
        $this->image =$category->image;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>['required',Rule::unique('service_categories')->ignore($this->category_id)],
            'description'=>'required',
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
    public function updateService()
    {
        $this->validate([
            'name'=>['required',Rule::unique('service_categories')->ignore($this->category_id)],
            'description'=>'required',
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
        
        $category = ServiceCategory::find($this->category_id);
        $category->name = $this->name;
        $category->description = $this->description;
        
        if($this->newimage)
        {
            unlink('assets/images/services'.'/'.$category->image);
            $imageName = Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $this->newimage->storeAs('services',$imageName);
            $category->image = $imageName;
        }
        $category->save();
        session()->flash('message','service has been updated successfully!');
    }


    public function render()
    {
        return view('livewire.admin.service.admin-edit-service-component')->layout('admin.layout');
    }
}
