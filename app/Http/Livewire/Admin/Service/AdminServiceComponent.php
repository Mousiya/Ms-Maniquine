<?php

namespace App\Http\Livewire\Admin\Service;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AdminServiceComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $categories=Category::paginate(5);
        return view('livewire.admin.service.admin-service-component',['categories'=>$categories])->layout('admin.layout');
    }
}
