<?php

namespace App\Http\Livewire\Admin\Service;

use App\Models\ServiceCategory;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\withPagination;

class AdminServiceComponent extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm;
    public $selectedCategories =[];
    public $selectAll=false;
    public $bulkDisabled=true;
    public $designTemplete= 'tailwind';

    public function mount()
    {
        $this->selectedCategories=collect();
    }

    public function deleteService($id)
    {
        $category = ServiceCategory::find($id);
        if($category->image)
        {
            unlink('assets/images/services'.'/'.$category->image);
        }
        if($category->images)
        {
            $images = explode(",",$category->images);
            foreach($images as $image)
            {
                if($image)
                {
                    unlink('assets/images/services'.'/'.$image);
                }
            }
        }
        $category->delete();
        session()->flash('message','Service has been deleted successfully!');
    }
    public function deleteSelected()
    {
        ServiceCategory::query()
        ->whereIn('id', $this->selectedCategories)
        ->delete();
        session()->flash('message','services have been deleted successfully!');
        $this->selectedCategories=[];
        $this->selectAll=false;
    }

    public function updatedSelectAll($value)
    {
        if($value){
            $this->selectedCategories =ServiceCategory::pluck('id');
        }else
        {
            $this->selectedCategories =[];
        }
    }

    public function render()
    {
        $this->bulkDisabled=count($this->selectedCategories)<1;
        $search = '%' . $this->searchTerm .'%';
        $categories =ServiceCategory::where('name','LIKE',$search)
                    ->orderBy('id','DESC')->paginate(5);
        //$categories=ServiceCategory::paginate(5);
        return view('livewire.admin.service.admin-service-component',['categories'=>$categories])->with('i',(request()->input('page',1)-1)*5)->layout('admin.layout');
    }
}
