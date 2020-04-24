<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Outlet;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::count();
        $product = Product::count();
        $outlet = Outlet::count();
        $customer = Customer::count();

        return view('home', compact('user','product','outlet', 'customer'));
    }
}
