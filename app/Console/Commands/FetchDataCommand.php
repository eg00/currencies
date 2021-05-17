<?php

namespace App\Console\Commands;

use App\Models\Currency;
use ErrorException;
use Illuminate\Console\Command;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class FetchDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:fetch {currency?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch currencies';

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
    public function handle(): int
    {

        try {
            $response = Http::get('https://www.cbr-xml-daily.ru/daily_json.js');
            $response->throw();
        } catch (RequestException $exception) {
            $this->error('Cannot fetch data');
            return 1;
        }

        $currencies = $response->collect('Valute');

        if ($this->argument('currency')) {
            try {
                $currency = $currencies[$this->argument('currency')];
            } catch (ErrorException $exception) {
                $this->error('Currency not found!');
                return 1;
            }

            $this->saveCurrency($currency);
            return 0;
        }

        $currencies->each(function ($currency) {
            $this->saveCurrency($currency);
        });

        return 0;
    }

    protected function saveCurrency(array $data): void
    {
        Currency::query()->updateOrCreate(
            ['name' => $data['Name']],
            [
                'char_code' => $data['CharCode'],
                'name' => $data['Name'],
                'rate' => $data['Value'] / $data['Nominal']
            ]);
    }

}
