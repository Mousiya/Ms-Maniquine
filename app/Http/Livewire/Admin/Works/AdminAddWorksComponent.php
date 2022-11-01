<?php

namespace App\Http\Livewire\Admin\Works;

use App\Models\Work;
use App\Models\ServiceCategory;
use Carbon\Carbon;
use Livewire\Component;

use Livewire\WithFileUploads;

class AdminAddWorksComponent extends Component
{
    use WithFileUploads;
    
    public $name;
    public $description;
    public $image;
    public $images;
    public $category_id;

    public function mount()
    {

    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>'required',
            'description'=>'required',
            'image'=>'required',
            'category_id'=>'required'
        ]);
    }

    public function addWork()
    {
        $this->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'required',
            'category_id'=>'required'
        ]);
        $work = new Work();
        $work->name = $this->name;
        $work->description = $this->description;
        
        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('works',$imageName);
        $work->image = $imageName; 
        
        if($this->images)
        {
            $imagesname='';
            foreach($this->images as $key=>$image)
            {
                $imgName = Carbon::now()->timestamp.$key. '.' . $this->image->extension();
                $image->storeAs('works',$imgName);
                $imagesname = $imagesname . ','.$imgName;
            }
            $work->images=$imagesname;
        }

        
        $work->category_id= $this->category_id;
        $work->save();
        session()->flash('message','work has been created successfully!');
    }
    public function render()
    {
        $categories=ServiceCategory::all();
        return view('livewire.admin.works.admin-add-works-component',['categories'=>$categories])->layout('admin.layout');
    }
}
