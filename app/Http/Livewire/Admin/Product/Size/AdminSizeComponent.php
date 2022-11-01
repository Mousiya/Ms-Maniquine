<?php

namespace App\Http\Livewire\Admin\Product\Size;

use App\Models\Size;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\withPagination;

class AdminSizeComponent extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm;
    public $selectedSizes =[];
    public $selectAll=false;
    public $bulkDisabled=true;
    public $designTemplete= 'tailwind';

    public $name;
    public $status;

    public function mount()
    {
        $this->selectedSizes=collect();
        $this->status =1;
    }

    public function deleteSize($id)
    {
        $size = Size::find($id);
        $size->delete();
        session()->flash('message','Size has been deleted successfully!');
    }

    public function deleteSelected()
    {
        Color::query()
        ->whereIn('id', $this->selectedSizes)
        ->delete();
        session()->flash('message','Sizes have been deleted successfully!');
        $this->selectedSizes=[];
        $this->selectAll=false;
    }
    public function updatedSelectAll($value)
    {
        if($value){
            $this->selectedSizes =Size::pluck('id');
        }else
        {
            $this->selectedSizes =[];
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>'required|unique:colors,name',
            'status'=>'required'
        ],
        [
            'unique'=> 'this size is already exit'
        ]);
    }
    public function addSize()
    {
        $this->validate([
            'name'=>'required|unique:colors,name',
            'status'=>'required',
        ],
        [
            'unique'=> 'this size is already exit'
        ]
    );
        $size = new Size();
        $size->name = $this->name;
        $size->status = $this->status;
        $size->save();
        session()->flash('message','color has been created successfully!');
    }

    public function render()
    {
        $this->bulkDisabled=count($this->selectedSizes)<1;
        $search = '%' . $this->searchTerm .'%';
        $sizes =Size::where('name','LIKE',$search)
                    ->orderBy('id','DESC')->paginate(10);
        //$sizes=Size::paginate(5);
        return view('livewire.admin.product.size.admin-size-component',['sizes'=>$sizes])->layout('admin.layout');
    }
}
