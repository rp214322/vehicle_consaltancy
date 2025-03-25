<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearAllCaches extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:clear-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear view, cache, config, and route caches';

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
    public function handle(): void
    {
        $this->call('view:clear');
        $this->info('View cache cleared!');

        $this->call('cache:clear');
        $this->info('Application cache cleared!');

        $this->call('config:clear');
        $this->info('Configuration cache cleared!');

        $this->call('route:clear');
        $this->info('Route cache cleared!');

        $this->call('optimize:clear');
        $this->info('Optimized cache cleared!');

        $this->info('✅ All caches cleared successfully!');
    }
}
