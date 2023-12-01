<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\CryptoCurrency;

class UpdateCryptoCurrencies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:crypto-currencies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updating and creating a new listings of cryptocurrencies.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $response = Http::get('https://api.coinpaprika.com/v1/tickers');

            $all_currencies = $response->json();

            foreach($all_currencies as $currency){
                $isEditedCurrency = CryptoCurrency::where('crypto_id', $currency['id'])->first();
                if(empty($isEditedCurrency)){
                    CryptoCurrency::create(
                        [
                            'crypto_id' => $currency['id'],
                            'rank' => $currency['rank'],
                            'name' => $currency['name'],
                            'symbol' => $currency['symbol'],
                            'price' => $currency['quotes']['USD']['price'],
                            'percent_change_15m' => $currency['quotes']['USD']['percent_change_15m']
                        ],
                    );
                } else {
                    CryptoCurrency::where('isEdited', false)->where('crypto_id', $currency['id'])->update(
                        [
                            'rank' => $currency['rank'],
                            'price' => $currency['quotes']['USD']['price'],
                            'percent_change_15m' => $currency['quotes']['USD']['percent_change_15m']
                        ],
                    );
                }
            }
            $this->info('Data updated successfully!');
        } catch (Exception $e) {
            $this->info($e->getMessage());
        }

    }
}
