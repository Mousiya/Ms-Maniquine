<?php

namespace App\Http\Livewire\Admin\Coupon;


use App\Models\Coupon;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\withPagination;

class AdminCouponsComponent extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm;
    public $selectedCoupons =[];
    public $selectAll=false;
    public $bulkDisabled=true;
    public $designTemplete= 'tailwind';


    public function mount()
    {
        $this->selectedCoupons=collect();
    }

    public function deleteCoupon($id)
    {
        $coupon = Coupon::find($id);
        $coupon->delete();
        session()->flash('message','Coupon has been deleted successfully!');
    }

    public function deleteSelected()
    {
        Coupon::query()
        ->whereIn('id', $this->selectedCoupons)
        ->delete();
        session()->flash('message','Coupons have been deleted successfully!');
        $this->selectedCoupons=[];
        $this->selectAll=false;
    }
    
    public function updatedSelectAll($value)
    {
        if($value){
            $this->selectedCoupons =Coupon::pluck('id');
        }else
        {
            $this->selectedCoupons =[];
        }
    }

    public function render()
    {
        $this->bulkDisabled=count($this->selectedCoupons)<1;
        $search = '%' . $this->searchTerm .'%';
        $coupons =Coupon::where('code','LIKE',$search)
                    ->orderBy('id','DESC')->paginate(5);
        //$categories=Category::paginate(4);

        return view('livewire.admin.coupon.admin-coupons-component',['coupons'=>$coupons])->layout('admin.layout');
    }
}
