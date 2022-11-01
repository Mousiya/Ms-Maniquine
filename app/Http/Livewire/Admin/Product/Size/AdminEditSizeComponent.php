<?php

namespace App\Http\Livewire\Admin\Product\Size;

use App\Models\Size;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Livewire\withPagination;

class AdminEditSizeComponent extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm;
    public $selectedSizes =[];
    public $selectAll=false;
    public $bulkDisabled=true;
    public $designTemplete= 'tailwind';

    public $size_id;
    public $name;
    public $status;

    public function mount($size_id)
    {
        $this->selectedSizes=collect();
        $this->size_id =$size_id;
        $size = Size::where('id',$size_id)->first();
        $this->size_id =$size->id;
        $this->name =$size->name;
        $this->status =$size->status;
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
            'name'=>['required',Rule::unique('sizes')->ignore($this->size_id)],
            'status'=>'required',
        ],
        [
            'unique'=> 'this size is already exit'
        ]);
    }
    public function updatesize()
    {
        $this->validate([
            'name'=>'required',
            'status'=>'required',
        ], 
        [
            'unique'=> 'this size is already exit'
        ]);
        
        $size = Size::find($this->size_id);
        $size->name = $this->name;
        $size->status = $this->status;
        $size->save();
        session()->flash('message','Size has been updated successfully!');
    }
    public function render()
    {
        $this->bulkDisabled=count($this->selectedSizes)<1;
        $search = '%' . $this->searchTerm .'%';
        $sizes =Size::where('name','LIKE',$search)
                    ->orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.product.size.admin-edit-size-component',['sizes'=>$sizes])->layout('admin.layout');
    }
}
