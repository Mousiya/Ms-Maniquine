<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

use Livewire\withPagination;

class CustomerDetailComponent extends Component
{
    use withPagination;
    public function render()
    {
        $customers = User::where('utype','USER')->first()->paginate(5);
        return view('livewire.admin.customer-detail-component',['customers'=>$customers]);
    }
}
