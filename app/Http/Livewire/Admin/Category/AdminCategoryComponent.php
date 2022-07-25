<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;

class AdminCategoryComponent extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public function render()
    {
        $categories=Category::paginate(5);
        return view('livewire.admin.category.admin-category-component',['categories'=>$categories])->layout('admin.layout');
    }
}
