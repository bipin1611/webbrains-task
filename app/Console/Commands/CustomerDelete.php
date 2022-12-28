<?php

namespace App\Console\Commands;

use App\Models\Customer;
use Illuminate\Console\Command;

class CustomerDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:customers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Customers Delete Command';

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
        // Delete soft deleted customers
        Customer::onlyTrashed()->forceDelete();

        return 0;
    }
}
