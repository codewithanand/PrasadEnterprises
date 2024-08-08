<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    public function show_shop()
    {
        return view("client.ecommerce.shop");
    }
    public function show_cart()
    {
        return view("client.ecommerce.cart");
    }

    public function show_checkout()
    {
        return view("client.ecommerce.checkout");
    }

    public function show_order()
    {
        return view("client.ecommerce.order");
    }
}
