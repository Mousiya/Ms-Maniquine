<?php

namespace App\Http\Livewire\Admin\Product\Colour;

use App\Models\Colour;
//use Carbon\Carbon;
use Livewire\Component;
//use Illuminate\Support\Str;
//use Livewire\WithFileUploads;


class AdminAddColourComponent extends Component
{
    public $name;
    public $code;
    public $status;
    

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>'required',
            'code'=>'required',
            'status'=>'required'
        ]);
    }
    public function addColour()
    {
        $this->validate([
            'name'=>'required',
            'code'=>'required',
            'status'=>'required',
        ]);
        $colour = new Colour();
        $colour->name = $this->name;
        $colour->code = $this->code;
        $colour->status = $this->status;
        $colour->save();
        session()->flash('message','category has been created successfully!');
    }
    public function render()
    {
        return view('livewire.admin.product.colour.admin-add-colour-component')->layout('admin.layout');
    }
}
