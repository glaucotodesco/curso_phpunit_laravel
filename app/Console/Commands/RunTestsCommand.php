<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class RunTestsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tests';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute all tests';

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
     * @return inaat
     */
    public function handle()
    {
        Artisan::call('test');
        $this->info(Artisan::output());

        Artisan::call('dusk');
        $this->info(Artisan::output());

        return 0;
    }
}
