<?php

namespace App\Http\Livewire\Admin\Works;

use App\Models\Work;
use App\Models\ServiceCategory;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditWorksComponent extends Component
{
    use WithFileUploads;
    
    public $name;
    public $description;
    public $image;
    public $images;
    public $category_id;
    public $newimages;
    public $newimage;
    public $work_id;
    public function mount($work_id)
    {
        $work= Work::where('id',$work_id)->first();
        $this->name = $work->name; 
        $this->description = $work->description;
        $this->image = $work->image;
        $this->images=explode(",",$work->images);
        $this->category_id = $work->category_id;
        $this->work_id = $work->id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>'required',
            'description'=>'required',
            'category_id'=>'required'
        ]);
        if($this->newimage)
        {
            $this->validateOnly($fields,[
                'newimage'=>'required'
            ]);
        }
    }

    public function updateWork()
    {
        $this->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'required',
            'category_id'=>'required'
        ]);
        if($this->newimage)
        {
            $this->validate([
                'newimage'=>'required'
            ]);
        }
        $work = Work::find($this->work_id);
        $work->name = $this->name;
        $work->description = $this->description;
        if($this->newimage)
        {
            unlink('assets/images/works'.'/'.$work->image);
            $imageName = Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $this->newimage->storeAs('works',$imageName);
            $work->image = $imageName;
        }

        if($this->newimages)
        {
            if($work->images)
            {
                $images=explode(",",$work->images);
                foreach($images as $image)
                {
                    if($image)
                    {
                        unlink('assets/images/works'.'/'.$image);
                    }
                }
            }
                $imagesname='';
                foreach($this->newimages as $key=>$image)
                {
                    $imgName = Carbon::now()->timestamp. $key.'.' . $image->extension();
                    $image->storeAs('works',$imgName);
                    $imagesname=$imagesname.','.$imgName;
                }
                $work->images = $imagesname;
            
        }


        $work->category_id= $this->category_id;
        $work->save();
        session()->flash('message','work has been updated successfully!');
    }

    public function render()
    {
        $categories=ServiceCategory::all();
        return view('livewire.admin.works.admin-edit-works-component',['categories'=>$categories])->layout('admin.layout');
    }
}
