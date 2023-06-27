<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class createTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create task as {user} {task} {--description} ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create new task from name and description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
}
