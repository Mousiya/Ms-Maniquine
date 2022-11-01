<?php

namespace App\Http\Livewire\Admin\Product\Colour;

use App\Models\Color;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\withPagination;

class AdminColourComponent extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm;
    public $selectedColors =[];
    public $selectAll=false;
    public $bulkDisabled=true;
    public $designTemplete= 'tailwind';
    
    public $name;
    public $code;
    public $status;

    public function mount()
    {
        $this->selectedColors=collect();
        $this->status =1;
    }
    public function deleteColour($id)
    {
        $colour = Color::find($id);
        $colour->delete();
        session()->flash('message','Colour has been deleted successfully!');
    }
    public function deleteSelected()
    {
        Color::query()
        ->whereIn('id', $this->selectedColors)
        ->delete();
        session()->flash('message','Colours have been deleted successfully!');
        $this->selectedColors=[];
        $this->selectAll=false;
    }
    public function updatedSelectAll($value)
    {
        if($value){
            $this->selectedColors =Color::pluck('id');
        }else
        {
            $this->selectedColors =[];
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>'required|unique:colors,name',
            'code'=>'required|unique:colors,code',
            'status'=>'required'
        ],
        [
            'unique'=> 'this colour is already exit'
        ]);
    }
    public function addColor()
    {
        $this->validate([
            'name'=>'required|unique:colors,name',
            'code'=>'required|unique:colors,code',
            'status'=>'required',
        ],
        [
            'unique'=> 'this colour is already exit'
        ]
    );
        $colour = new Color();
        $colour->name = $this->name;
        $colour->code = $this->code;
        $colour->status = $this->status;
        $colour->save();
        session()->flash('message','color has been created successfully!');
    }

    public function render()
    {
        $this->bulkDisabled=count($this->selectedColors)<1;
        $search = '%' . $this->searchTerm .'%';
        $colors =Color::where('name','LIKE',$search)
                    ->orderBy('id','DESC')->paginate(10);
        //$colours=Color::paginate(5);
        return view('livewire.admin.product.colour.admin-colour-component',['colors'=>$colors])->layout('admin.layout');
    }
}
