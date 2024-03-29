<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RefreshDatabaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:r';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'migrate:fresh and db:seed';

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

        $this->call('migrate:fresh');
        $this->call('db:seed');

        $this->info('Migrasi telah disegarkan dan siap digunakan');
    }
}
