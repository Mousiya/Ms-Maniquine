<?php

namespace App\Http\Livewire\Admin\Product\Size;

use App\Models\Size;
//use Carbon\Carbon;
use Livewire\Component;
//use Illuminate\Support\Str;
//use Livewire\WithFileUploads;
//use Illuminate\Http\Request;

class AdminAddSizeComponent extends Component
{
    public $name;
    public $status;
    

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>'required',
            'status'=>'required'
        ]);
    }
    public function addSize()
    {
        $this->validate([
            'name'=>'required',
            'status'=>'required',
        ]);
        $size = new Size();
        $size->name = $this->name;
        $size->status = $this->status;
        $size->save();
        session()->flash('message','category has been created successfully!');
    }
    public function render()
    {
        return view('livewire.admin.product.size.admin-add-size-component')->layout('admin.layout');
    }
}
