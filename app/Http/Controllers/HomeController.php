<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\SpecialPrice;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\SpecialProductPriceRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // fetching clients.
        $clients = User::role('Client')->paginate(10);
        return view('home', compact('clients'));
    }
    public function create(User $client)
    {
        // form for setting special prices.
        $products = Product::all();
        return view('set-prices', compact('client', 'products'));
    }
    public function store(SpecialProductPriceRequest $request)
    {
        // storing special product price
        try {
            $input = $request->all();
            $productIds = $input['product_id'];
            $specialPrice = $input['special_price'];

            foreach ($productIds as $productId) {
                $specialPriceRecord = new SpecialPrice([
                    'user_id' => $input['user_id'],
                    'product_id' => $productId,
                    'special_price' => $specialPrice,
                ]);

                $specialPriceRecord->save();
            }
            Session::flash('success', 'Special Price set successfully!');
            return redirect()->route('home');
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }
}
