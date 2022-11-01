<?php

namespace App\Http\Livewire\Admin\Homeslide;

use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditHomeSlideComponent extends Component
{
    use WithFileUploads;

    use WithFileUploads;
    public $slide_id; 
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $status;
    public $image;
    public $newimage; 
    
    public function mount($slide_id)
    {
        $slider = HomeSlider::where('id',$slide_id)->first();
        $this->slide_id=$slider->id;
        $this->title =$slider->title;
        $this->subtitle = $slider->subtitle;
        $this->price = $slider->price;
        $this->link = $slider->link;
        $this->status = $slider->status;
        $this->image = $slider->image;
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title'=>'required',
            'subtitle'=>'required',
            'link'=>'required',
            'image'=>'required',
            'status'=>'required',
        ]);
        if($this->newimage)
        {
            $this->validateOnly($fields,[
                'newimage'=>'required'
            ]);
        }
    }
    public function updateSlide()
    {
        $this->validate([
            'title'=>'required',
            'subtitle'=>'required',
            'link'=>'required',
            'image'=>'required',
            'status'=>'required',
        ]);
        if($this->newimage)
        {
            $this->validate([
                'newimage'=>'required'
            ]);
        }
        
        $slider = HomeSlider::find($this->slide_id);
        $slider-> title = $this->title;
        $slider-> subtitle = $this->subtitle;
        $slider-> price = $this->price;
        $slider-> link = $this->link;
        $slider-> image = $this->image;
        $slider-> status = $this->status;
        
        if($this->newimage)
        {   unlink('assets/images/home_sliders'.'/'.$slider->image);
            $imageName = Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $this->newimage->storeAs('home_sliders',$imageName);
            $slider->image = $imageName;
        }
        $slider->save();
        session()->flash('message','Home slide has been updated successfully!');
    }
    public function render()
    {
        return view('livewire.admin.homeslide.admin-edit-home-slide-component')->layout('admin.layout');
    }
}
