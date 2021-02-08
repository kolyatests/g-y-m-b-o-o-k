<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class kolya extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kolya';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'kolya adam';

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
//        $this->line( 'привет');
//        $y=$this->ask("Как дела");
//        $this->line( $y.'?');

//        $id=$this->argument();
//        $this->line("Some text");
//        $this->info("Hey, watch this !");
//        $this->comment("Just a comment passing by");
//        $this->question("Why did you do that?");
//        $this->error("Ops, that should not happen.");
//        $pp=(User::find($id));
//
        $this->call('cache:clear');
        $this->call('config:clear');
        $this->call('route:clear');
        $this->call('view:clear');
        $this->call('optimize');

        system('composer dump-autoload');
        system('composer ide');
    }
}
