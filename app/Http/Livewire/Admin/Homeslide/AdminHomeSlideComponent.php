<?php

namespace App\Http\Livewire\Admin\Homeslide;

use App\Models\HomeSlider;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\withPagination;

class AdminHomeSlideComponent extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm;
    public $selectedSliders =[];
    public $selectAll=false;
    public $bulkDisabled=true;
    public $designTemplete= 'tailwind';

    public function mount()
    {
        $this->selectedSliders=collect();
    }

    public function deletehomeslider($id)
    {
        $slider = HomeSlider::find($id);
        if($slider->image)
        {
            unlink('assets/images/home_sliders'.'/'.$slider->image);
        }
        if($slider->images)
        {
            $images = explode(",",$slider->images);
            foreach($images as $image)
            {
                unlink('assets/images/home_sliders'.'/'.$image);
            }
        }
        $slider->delete();
        session()->flash('message','Home Slider has been deleted successfully!');
    }
    public function deleteSelected()
    {
        HomeSlider::query()
        ->whereIn('id', $this->selectedSliders)
        ->delete();
        session()->flash('message','sliders have been deleted successfully!');
        $this->selectedSliders=[];
        $this->selectAll=false;
    }

    public function updatedSelectAll($value)
    {
        if($value){
            $this->selectedSliders =HomeSlider::pluck('id');
        }else
        {
            $this->selectedSliders =[];
        }
    }
    public function render()
    {
        $this->bulkDisabled=count($this->selectedSliders)<1;
        $search = '%' . $this->searchTerm .'%';
        $sliders =HomeSlider::where('title','LIKE',$search)
                    ->orderBy('id','DESC')->paginate(5);
        //$sliders=HomeSlider::paginate(5);
        return view('livewire.admin.homeslide.admin-home-slide-component',['sliders'=>$sliders])->with('i',(request()->input('page',1)-1)*5)->layout('admin.layout');
    }

}
