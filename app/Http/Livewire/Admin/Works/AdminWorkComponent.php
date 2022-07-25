<?php

namespace App\Http\Livewire\Admin\Works;

use App\Models\Work;
use Livewire\Component;
use Livewire\WithPagination;

class AdminWorkComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $works=Work::paginate(5);
        return view('livewire.admin.works.admin-work-component',['works'=>$works])->layout('admin.layout');
    }
}
