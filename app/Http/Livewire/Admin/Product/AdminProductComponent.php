<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Dress;
use App\Models\Category;
use Livewire\Component;
use Livewire\withPagination;

class AdminProductComponent extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm;
    public $selectedProducts =[];
    public $selectAll=false;
    public $bulkDisabled=true;
    public $designTemplete= 'tailwind';

    public function mount()
    {
        $this->selectedProducts=collect();
    }

    public function deleteProduct($id)
    {
        $dress = Dress::find($id);
        if($dress->image)
        {
            unlink('assets/images/dresses'.'/'.$dress->image);
        }

        if($dress->sizechart)
        {
            unlink('assets/images/sizechart'.'/'.$dress->sizechart);
        }
        
        if($dress->images)
        {
            $images = explode(",",$dress->images);
            foreach($images as $image)
            {
                if($image)
                {
                    unlink('assets/images/dresses'.'/'.$image);
                }
            }
        }

        $dress->delete();
        session()->flash('message','Dress has been deleted successfully!');
    }

    public function deleteSelected()
    {
        Dress::query()
        ->whereIn('id', $this->selectedProducts)
        ->delete();
        session()->flash('message','Dresses have been deleted successfully!');
        $this->selectedProducts=[];
        $this->selectAll=false;
    }
    public function updatedSelectAll($value)
    {
        if($value){
            $this->selectedProducts =Dress::pluck('id');
        }else
        {
            $this->selectedProducts =[];
        }
    }

    public function render()
    {
        $search = '%' . $this->searchTerm .'%';
        $dresses =Dress::where('name','LIKE',$search)
                    ->orwhere('stock_status','LIKE',$search)
                    ->orwhere('regular_price','LIKE',$search)
                    ->orwhere('sale_price','LIKE',$search)
                    ->orderBy('id','DESC')->paginate(5);
        //$dresses=Dress::paginate(5);
        return view('livewire.admin.product.admin-product-component',['dresses'=>$dresses])->layout('admin.layout');
    }
}
