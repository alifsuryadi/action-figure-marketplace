<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // Ambil dengan relasinya
        $transactions = TransactionDetail::with(['transaction.user', 'product.galleries'])
                                ->whereHas('product', function($product){
                                    $product->where('users_id', Auth::user()->id);
                                });

        $revenue = $transactions->get()->reduce(function ($carry, $item){
            return $carry + $item->price;
        });

        $costumer = User::where('roles', 'USER')->count();

        return view('pages.dashboard', [
            'transaction_count' => $transactions->count(),
            'transaction_data' => $transactions->take(4)->get(),
            'revenue' => $revenue,
            'costumer' => $costumer,
        ]);
    }
}