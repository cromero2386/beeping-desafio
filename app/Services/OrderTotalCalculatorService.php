<?php

namespace App\Services;

use App\Models\Order;

class OrderTotalCalculatorService
{
    /**
     * Displays the total of each order
     *
     * @return \Illuminate\Http\Response
     */
    public function getTotalOrders() : array
    {
        $orders = Order::orderBy('id', 'ASC')->with('orderLines.product')->get();
        
        $orders->each(function ($order) use (&$totals) {
            $total = $order->orderLines->sum(function ($orderLine) {
                return $orderLine->qty * $orderLine->product->cost;
            });
        
            $totals[] = ['order_ref'=> $order->order_ref, 'total_order' => round($total, 2)];
        });
        
        return $totals;
    }
    
}
