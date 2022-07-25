<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;

class AdminEditProductComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.product.admin-edit-product-component')->layout('admin.layout');
    }
}
