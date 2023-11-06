<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class OrderService
{
    /**
     * Displays the total of each order
     *
     * @return \Illuminate\Http\Response
     */
    public static function getTotalOrders() : array
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
    /**
     * returns orders with quantity of products and total per order
     */
    public static function getListsOrders()
    {
        $ordenes = Order::with('orderLines.product')
            ->select('id', 'order_ref', 'customer_name')
            ->withCount(['orderLines as total_qty' => function ($query) {
                $query->select(DB::raw('SUM(qty)'));
            }])
            ->with(['orderLines' => function ($query) {
                $query->select('order_id')
                    ->selectSub(Product::selectRaw('SUM(cost * qty) as total_cost')->whereColumn('order_lines.product_id', 'products.id'), 'total_cost');
            }])
            ->get();
            // Calcular el costo total por orden
            foreach ($ordenes as $orden) {
                $orden->total_cost = round($orden->orderLines->sum('total_cost'), 2);
            }
        return $ordenes;
    }
}
