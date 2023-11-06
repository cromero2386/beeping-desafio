<?php

namespace App\Http\Livewire;

use App\Services\OrderService;
use Livewire\Component;

class OrderList extends Component
{
    public $colOrders  = [
        'order_ref' => 'Order Reference',
        'customer_name' => 'Customer Name',
        'total_qty' => 'Total Qty',
        'total_cost' => 'Total Cost'
    ];
    public function render()
    {
        return view('livewire.order-list', [
            'orders' => OrderService::getListsOrders()
        ]);
    }


}
