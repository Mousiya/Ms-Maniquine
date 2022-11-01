<?php

namespace App\Http\Livewire\Admin\Homeslide;

use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddHomeSlideComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $status;
    
    public function mount()
    {
        $this->status =0;
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
    }
    public function addSlide()
    {
        $this->validate([
            'title'=>'required',
            'subtitle'=>'required',
            'link'=>'required',
            'image'=>'required',
            'status'=>'required',
        ]);
        $slider = new HomeSlider();
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = $this->price;
        $slider->link = $this->link;
        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('home_sliders',$imageName);
        $slider->image = $imageName;
        $slider->status = $this->status;
        $slider->save();
        session()->flash('message','home slider has been created successfully!');
    }

    public function render()
    {
        return view('livewire.admin.homeslide.admin-add-home-slide-component')->layout('admin.layout');
    }
}
