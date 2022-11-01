<?php

namespace App\Http\Livewire\Admin\Product\Colour;

use App\Models\Color;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Livewire\withPagination;

class AdminEditColourComponent extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm;
    public $selectedColors =[];
    public $selectAll=false;
    public $bulkDisabled=true;
    public $designTemplete= 'tailwind';

    public $color_id;
    public $name;
    public $code;
    public $status;

    public function mount($color_id)
    {
        $this->selectedColors=collect();
        $this->color_id =$color_id;
        $color = Color::where('id',$color_id)->first();
        $this->color_id =$color->id;
        $this->name =$color->name;
        $this->code =$color->code;
        $this->status =$color->status;
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

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>['required',Rule::unique('colors')->ignore($this->color_id)],
            'code'=>['required',Rule::unique('colors')->ignore($this->color_id)],
            'status'=>'required',
        ],
        [
            'unique'=> 'this colour is already exit'
        ]);
    }
    public function updatecolor()
    {
        $this->validate([
            'name'=>['required',Rule::unique('colors')->ignore($this->color_id)],
            'code'=>['required',Rule::unique('colors')->ignore($this->color_id)],
            'status'=>'required',
        ],
        [
            'unique'=> 'this colour is already exit'
        ]);
        
        $color = Color::find($this->color_id);
        $color->name = $this->name;
        $color->code = $this->code;
        $color->status = $this->status;
        $color->save();
        session()->flash('message','colour has been updated successfully!');
    }
    public function render()
    {
        $this->bulkDisabled=count($this->selectedColors)<1;
        $search = '%' . $this->searchTerm .'%';
        $colors =Color::where('name','LIKE',$search)
                    ->orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.product.colour.admin-edit-colour-component',['colors'=>$colors])->layout('admin.layout');
    }
}
