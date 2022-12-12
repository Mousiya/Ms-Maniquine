<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\ServiceCategory;

class FooterQuickLinksComponent extends Component
{
    public function render()
    {
        $categories=Category::all();
        $w_categories=ServiceCategory::all();
        return view('livewire.footer-quick-links-component',[ 'categories'=>$categories,'w_categories'=>$w_categories ]);
    }
}
