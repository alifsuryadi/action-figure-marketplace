<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $costumer = User::count();
        // $revenue = Transaction::where('transaction_status', 'SUCCESS')->sum('total_price');
        $revenue = Transaction::sum('total_price');
        $transaction = Transaction::count();

        // Grafik
        $total_price = Transaction::select(DB::raw("CAST(SUM(total_price) as int) as total_price"))
                        ->GroupBy(DB::raw("DATE(created_at)")) // Ubah menjadi harian
                        ->pluck('total_price');

        $tanggal = Transaction::select(DB::raw("DATE(created_at) as tanggal")) // Ubah menjadi harian
                        ->GroupBy(DB::raw("DATE(created_at)"))
                        ->pluck('tanggal');


        return view('pages.admin.dashboard', [
            'costumer' => $costumer,
            'revenue' => $revenue,
            'transaction' => $transaction,
            'total_price' => $total_price,
            'tanggal' => $tanggal,
        ]);
    }
}