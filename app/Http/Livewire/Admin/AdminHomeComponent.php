<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class AdminHomeComponent extends Component
{
    public function updateOrderStatus($order_id,$status)
    {
        $order = Order::find($order_id);
        $order->status=$status;
        if($status=="delivered")
        {
            $order->delivered_date=DB::raw('CURRENT_DATE');
        }
        else if($status=="canceled")
        {
            $order->canceled_date=DB::raw('CURRENT_DATE');
        }
        else if($status=="ready_to_shipped")
        {
            $order->ready_to_shipped_date=DB::raw('CURRENT_DATE');
        }
        else if($status=="shipped")
        {
            $order->shipped_date=DB::raw('CURRENT_DATE');
        }
        $order->save();
        session()->flash('order_message','Order status has been updated successfully!');
    }
    public function render()
    {
        $orders= Order::orderBy('created_at','DESC')->get()->take(10);
        $totalSales= Order::where('status','delivered')->count();  
        $totalRevenue = Order::where('status','delivered')->sum('total');
        $todaySales= Order::where('status','delivered')->whereDate('created_at',Carbon::today())->count();  
        $todayRevenue = Order::where('status','delivered')->whereDate('created_at',Carbon::today())->sum('total');
        $orderdetail = Order::orderBy('created_at','DESC')->paginate(12);
        return view('livewire.admin.admin-home-component',[
            'orders'=>$orders,
            'totalSales'=>$totalSales,
            'totalRevenue'=>$totalRevenue,
            'todaySales'=>$todaySales,
            'todayRevenue'=>$todayRevenue,
            'orderdetail'=>$orderdetail
        ])->layout('admin.layout');
    }
}
