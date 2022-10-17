<?php

namespace App\Console\Commands;

use App\Models\Currency;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SupplementCurrencies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'supplement:currencies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Supplement currencies in database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = Http::retry(3, 100)->get('https://www.nbrb.by/api/exrates/rates?periodicity=0');
        $currencies = $response->collect()->keyBy('Cur_Abbreviation');

        foreach ($currencies as $currency) {
            Currency::create([
                'name' => $currency['Cur_Name'],
                'curs' => $currency['Cur_OfficialRate'],
                'date' => $currency['Date']

            ]);
//            print_r($currency);
        }


//        $currency = $currencies[$this->argument('currency')];


//        print_r($currency);


    }
}
