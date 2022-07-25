<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Dress;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $dresses=Dress::paginate(5);
        return view('livewire.admin.product.admin-product-component',['dresses'=>$dresses])->layout('admin.layout');
    }
}
