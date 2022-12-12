<?php

namespace App\Http\Livewire\Customer\Dashboard;

use App\Models\OrderDetail;
use App\Models\Review;
use Livewire\Component;

class CustomerReviewComponent extends Component
{
    public $order_item_id;
    public $rating;
    public $comment;

    public function mount($order_item_id)
    {
        $this->order_item_id = $order_item_id;
    }

    public function updated($fields)
    {
        $this->validate([
            'rating'=>'required',
            'comment'=>'required'
        ]);
    }

    public function addReview()
    {
        $this->validate([
            'rating'=>'required',
            'comment'=>'required'
        ]);
        $review =new Review();
        $review->rating = $this->rating;
        $review->comment= $this->comment;
        $review->order_item_id=$this->order_item_id;
        $review->save();

        $orderDetails = OrderDetail::find($this->order_item_id);
        $orderDetails->rstatus = true;
        $orderDetails->save();
        session()->flash('message','Your review has been added successfully!');

    } 

    public function render()
    {
        $orderDetails= OrderDetail::find($this->order_item_id);
        return view('livewire.customer.dashboard.customer-review-component',['orderDetails'=>$orderDetails])->layout('layouts.base');
    }
}
