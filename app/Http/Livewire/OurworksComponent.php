<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Work;
use Livewire\withPagination;
use App\Models\ServiceCategory;

class OurworksComponent extends Component
{
    use withPagination;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
    }

    public function render()
    {
        if($this->sorting=='date')
        {
            $works =Work::orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        else
        {
            $works =Work::orderBy('created_at','ASC')->paginate($this->pagesize);
        }

        $categories=ServiceCategory::all();

        return view('livewire.ourworks-component',['works'=> $works,'categories'=>$categories] )->layout('layouts.base');
    }
}
