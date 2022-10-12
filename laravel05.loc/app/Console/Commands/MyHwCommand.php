<?php

namespace App\Console\Commands;

use App\Mail\CurrencyMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class MyHwCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:currencies {currency} {--email=maxolhevski@mail.ru}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending exchange rates to email';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = Http::retry(3, 100)->get('https://www.nbrb.by/api/exrates/rates?periodicity=0');
        $currencies = $response->collect()->keyBy('Cur_Abbreviation');

        $currency = $currencies[$this->argument('currency')];

        $mail = new CurrencyMail($currency['Cur_Name'], $currency['Cur_OfficialRate']);


        Mail::to($this->option('email'))->send($mail) ;


    }
}
