<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SalesController extends Controller
{

    public function generate_sale(Request $request) {

        // validate the incoming request data
        $data = $request->validate([
            'sale_price' => 'required|numeric|min:0.01',
            'currency' => 'required|string',
            'product_name' => 'required|string',
        ]);

        // get the seller_payme_id
        $data['seller_payme_id'] = env('SELLER_PAYME_ID');

        // constant values as described in the home assignment
        $data['installments'] = 1;
        $data['language'] = 'en';

        $payme_url = env('PAYME_URL');

        return Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post($payme_url,$data);
    }

    public function store_sale(Request $request) {

        $data = $request->validate([
            'currency' => 'required|string',
            'description' => 'required|string',
            'amount' => 'required|numeric|min:0.01',
            'payment_link' => 'required|string',
            'sale_number' => 'required|numeric|min:1'
        ]);
        $sale = Sale::create($data);
        return response()->json($sale, 201);
    }

    public function get_all_sales() {
        $sales = Sale::all();
        return response()->json($sales, 200);
    }
}
