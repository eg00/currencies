<?php

namespace App\Http\Controllers;

use App\Http\Resources\CurrencyResource;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * @group Currencies
     *
     * returns a list of exchange rates with the possibility of pagination
     *
     * @queryParam paginate int Pagination. Defaults to '10'.
     *
     * @apiResourceCollection App\Http\Resources\CurrencyResource
     * @apiResourceModel App\Models\Currency paginate=10
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $currencies = Currency::query()->paginate($request->query('paginate', 10));

        return CurrencyResource::collection($currencies);
    }

    /**
     * @group Currencies
     *
     * returns the currency rate for the passed id
     *
     * @urlParam $currency required The id or char_code of the currency. Example: 1
     *
     * @apiResource App\Http\Resources\CurrencyResource
     * @apiResourceModel App\Models\Currency
     *
     * @param \App\Models\Currency $currency
     * @return CurrencyResource
     */
    public function show(Currency $currency)
    {
        return new CurrencyResource($currency);
    }
}
