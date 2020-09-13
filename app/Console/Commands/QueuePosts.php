<?php

namespace App\Console\Commands;

use App\Jobs\ImportPosts;
use Illuminate\Console\Command;

class QueuePosts extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'queue:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import third party posts';

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
     * @return \Illuminate\Foundation\Bus\PendingDispatch
     */
    public function handle()
    {
        ImportPosts::dispatch();
        $this->info('Impost posts dispatched');
    }
}
