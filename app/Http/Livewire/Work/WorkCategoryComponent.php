<?php

namespace App\Http\Livewire\Work;

use Livewire\Component;

use App\Models\Work;
use Livewire\withPagination;
use App\Models\ServiceCategory;

class WorkCategoryComponent extends Component
{
    use withPagination;
    public $category_id;

    public function mount($category_id)
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->category_id=$category_id;
    }

    public function render()
    {
        $category=ServiceCategory::where('id',$this->category_id)->first();
        $category_id=$category->id;
        if($this->sorting=='date')
        {
            $works =Work::where('category_id',$category_id)->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        else
        {
            $works =Work::where('category_id',$category_id)->orderBy('created_at','ASC')->paginate($this->pagesize);
        }

        $categories=ServiceCategory::all();
        $category_name=$category->name;
        return view('livewire.work.work-category-component',['works'=> $works,'categories'=>$categories,'category_name'=>$category_name])->layout('layouts.base');
    }
}
