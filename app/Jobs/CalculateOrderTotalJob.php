<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Log;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Services\OrderTotalCalculatorService;

class CalculateOrderTotalJob
{
    use Dispatchable, Queueable;

    public function handle(OrderTotalCalculatorService $orderTotalCalculatorService)
    {
        $totals = $orderTotalCalculatorService->getTotalOrders();

        // Convierte el array de totales a formato de cadena para mostrarlo en la consola
        $totalsAsString = json_encode($totals);

        // Imprime el total de órdenes calculado en la consola
        echo 'Ordenes con su total: ' . $totalsAsString . "\n";
    }
}

