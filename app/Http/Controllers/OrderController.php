<?php

namespace App\Http\Controllers;

use App\Jobs\CalculateOrderTotalJob;
use App\Services\OrderTotalCalculatorService;

class OrderController extends Controller
{
    protected $orderTotalCalculatorService;

    public function __construct(OrderTotalCalculatorService $orderTotalCalculatorService)
    {
        $this->orderTotalCalculatorService = $orderTotalCalculatorService;
    }
    /**
     * Returns in json format the orders with their total by calling the service.
     */
    public function getTotalOrders()
    {
        $orders = $this->orderTotalCalculatorService->getTotalOrders();

        return response()->json($orders);
    }
    /**
     * Displays the result of the job execution on the screen.
     */
    public function getOrderTotalRunJob(){

        CalculateOrderTotalJob::dispatch();
        
    }
}
