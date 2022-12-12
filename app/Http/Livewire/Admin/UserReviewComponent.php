<?php

namespace App\Http\Livewire\Admin;

use App\Models\OrderDetail;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\withPagination;

class UserReviewComponent extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm;
    public $selectedReviews =[];
    public $selectAll=false;
    public $bulkDisabled=true;
    public $designTemplete= 'tailwind';

    public function mount()
    {
        $this->selectedReviews=collect();
    }

    public function deleteReview($id)
    {
        $category = Category::find($id);
        if($category->image)
        {
            unlink('assets/images/categories'.'/'.$category->image);
        }
        if($category->images)
        {
            $images = explode(",",$category->images);
            foreach($images as $image)
            {
                if($image)
                {
                    unlink('assets/images/categories'.'/'.$image);
                }
            }
        }
        $category->delete();
        session()->flash('message','Category has been deleted successfully!');
    }

    public function deleteSelected()
    {
        Category::query()
        ->whereIn('id', $this->selectedReviews)
        ->delete();
        session()->flash('message','Categories have been deleted successfully!');
        $this->selectedReviews=[];
        $this->selectAll=false;
    }
    
    public function updatedSelectAll($value)
    {
        if($value){
            $this->selectedReviews =Category::pluck('id');
        }else
        {
            $this->selectedReviews =[];
        }
    }
    
    public function render()
    {
        $this->bulkDisabled=count($this->selectedReviews)<1;
        $search = '%' . $this->searchTerm .'%';
        $orderDetails= OrderDetail::where('rstatus',1)->first()->paginate(5);

        return view('livewire.admin.user-review-component',['orderDetails'=>$orderDetails])->with('i',(request()->input('page',1)-1)*5)->layout('admin.layout');
    }
}
