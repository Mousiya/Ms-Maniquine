<?php

namespace App\Http\Livewire\Admin\Works;

use App\Models\Work;
use Livewire\Component;
use Livewire\withPagination;

class AdminWorkComponent extends Component
{
    use withPagination;

    use withPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm;
    public $selectedWorks =[];
    public $selectAll=false;
    public $bulkDisabled=true;
    public $designTemplete= 'tailwind';

    public function mount()
    {
        $this->selectedWorks=collect();
    }


    public function deleteWork($id)
    {
        $work = Work::find($id);
        if($work->image)
        {
            unlink('assets/images/works'.'/'.$work->image);
        }
        if($work->images)
        {
            $images = explode(",",$work->images);
            foreach($images as $image)
            {
                if($image)
                {
                    unlink('assets/images/works'.'/'.$image);
                }
            }
        }
        $work->delete();
        session()->flash('message','Work has been deleted successfully!');
    }

    public function deleteSelected()
    {
        Work::query()
        ->whereIn('id', $this->selectedWorks)
        ->delete();
        session()->flash('message','works have been deleted successfully!');
        $this->selectedWorks=[];
        $this->selectAll=false;
    }

    public function updatedSelectAll($value)
    {
        if($value){
            $this->selectedWorks =Work::pluck('id');
        }else
        {
            $this->selectedWorks =[];
        }
    }

    public function render()
    {
        $works=Work::paginate(5);
        return view('livewire.admin.works.admin-work-component',['works'=>$works])->layout('admin.layout');
    }
}
