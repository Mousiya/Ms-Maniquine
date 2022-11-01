<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Sale;


class AdminSaleComponent extends Component
{
    public $sale_date;
    public $status;

    public function mount()
    {
        $sale=Sale::find(1);
        $this->sale_date=$sale->sale_date;
        $this->status=$sale->status;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'sale_date'=>'required',
            'status'=>'required' 
        ]);
    }
    public function updateSale()
    {
        $this->validate([
            'sale_date'=>'required',
            'status'=>'required' 
        ]);
        $sale = Sale::find(1);
        $sale->sale_date=$this->sale_date;
        $sale->status = $this->status;
        $sale->save();
        session()->flash('message','Home category has been created successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-sale-component')->layout('admin.layout');
    }
}
