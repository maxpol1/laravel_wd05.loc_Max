<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FirstCommand extends Command
{


    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'parse:nbrb {currency?}';
//{--Q|queue=default}
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (!$this->argument('currency')){
            $currency = $this->choice(
                'What is your name?',
                ['Taylor', 'Dayle'],
                0
            );
            $this->line($currency);
        }
//        $this->argument('currency');
//        $this->argument();
//        $this->info($this->option('currency'));
//        return 0;
    }
}
