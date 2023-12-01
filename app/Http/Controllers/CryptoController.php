<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CryptoCurrency;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CryptoPostRequest;

class CryptoController extends Controller
{
    public function getCryptoCurrencies(){
        $all_currencies = CryptoCurrency::all();
        $top10 = DB::table('crypto_currencies')
                ->orderBy('percent_change_15m', 'desc')
                ->take(10)
                ->get();

        return response()->json(['all_currencies' => $all_currencies, 'top10' => $top10], 200);
    }

    public function updateRecord(CryptoPostRequest $request) {
        if ($request->isMethod('post')) {
            $request_price = $request->query('price');
            $request_rank = $request->query('rank');

            $currency = CryptoCurrency::where('rank', $request_rank)->first();

            $currency->price = $request_price;

            $currency->isEdited = true;

            $currency->save();

            return response()->json(['success' => ['updated-coin-name' => $currency->name, 'updated-price' => $currency->price]], 200);
        }
    }
}
