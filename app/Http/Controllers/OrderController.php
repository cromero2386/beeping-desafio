<?php

namespace App\Http\Controllers;

use App\Jobs\CalculateOrderTotalJob;
use App\Services\OrderService;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }
    /**
     * Returns in json format the orders with their total by calling the service.
     */
    public function getTotalOrders()
    {
        $orders = $this->orderService::getTotalOrders();

        return response()->json($orders);
    }
    /**
     * Displays the result of the job execution on the screen.
     */
    public function getOrderTotalRunJob()
    {

        CalculateOrderTotalJob::dispatch();
        
    }

    public function listadoOrders()
    {

        $ordenes = $this->orderService::getListsOrders();
        return response()->json($ordenes);
    }
}
