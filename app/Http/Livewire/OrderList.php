<?php

namespace App\Http\Livewire;

use App\Services\OrderService;
use Livewire\Component;

class OrderList extends Component
{
    public function render()
    {
        return view('livewire.order-list', [
            'orders' => OrderService::getListsOrders()
        ]);
    }


}
