<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function index(){
        \Stripe\Stripe::setApiKey('sk_test_51IJuVJJ6i8EplxSfviVdX16jXiCnfv4vUwWUkeFYHO60pLNLNwn1qutbITzSuaWkwVCd7ogbploF5lt0zVRVUVza00vaEwS9eD');
        $YOUR_DOMAIN = 'http://google.com';
        $checkout_session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
            'currency' => 'usd',
            'unit_amount' => 2000,
            'product_data' => [
                'name' => 'Stubborn Attachments',
                'images' => ["https://i.imgur.com/EHyR2nP.png"],
            ],
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => route('success'),
        'cancel_url' => route('cancel'),
        ]);
        echo json_encode(['id' => $checkout_session->id]);
    }
}
