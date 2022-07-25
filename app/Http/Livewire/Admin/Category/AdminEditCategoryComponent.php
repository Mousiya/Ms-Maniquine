<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class AdminEditCategoryComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.category.admin-edit-category-component')->layout('admin.layout');
    }
}
