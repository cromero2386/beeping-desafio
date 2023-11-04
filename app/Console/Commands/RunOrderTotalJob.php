<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\CalculateOrderTotalJob;

class RunOrderTotalJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:calculate-order-total';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command that returns the reference of an order and the total passing the reference, if it does not receive the reference it lists all the orders and their total.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Executing CalculateOrderTotalJob once...');
        
        dispatch(new CalculateOrderTotalJob());

        $this->info('CalculateOrderTotalJob executed!');
    }
}
