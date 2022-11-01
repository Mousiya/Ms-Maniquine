<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\withPagination;

class AdminCategoryComponent extends Component
{

    use withPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm;
    public $selectedProducts =[];
    public $selectAll=false;
    public $bulkDisabled=true;
    public $designTemplete= 'tailwind';

    public function mount()
    {
        $this->selectedProducts=collect();
    }

    public function deleteCategory($id)
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
        ->whereIn('id', $this->selectedProducts)
        ->delete();
        session()->flash('message','Categories have been deleted successfully!');
        $this->selectedProducts=[];
        $this->selectAll=false;
    }
    
    public function updatedSelectAll($value)
    {
        if($value){
            $this->selectedProducts =Category::pluck('id');
        }else
        {
            $this->selectedProducts =[];
        }
    }
    
    public function render()
    {
        $this->bulkDisabled=count($this->selectedProducts)<1;
        $search = '%' . $this->searchTerm .'%';
        $categories =Category::where('name','LIKE',$search)
                    ->orderBy('id','DESC')->paginate(5);
        //$categories=Category::paginate(4);

        return view('livewire.admin.category.admin-category-component',['categories'=>$categories])->with('i',(request()->input('page',1)-1)*5)->layout('admin.layout');
    }
}
