<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;

use Exception;
use Illuminate\Support\Facades\Auth;

use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Notification;


class CheckoutController extends Controller
{

    public function process(Request $request)
    {
        // Save users data
        $user = Auth::user();
        $user->update($request->except('total_price'));

        $code = 'STORE-' . mt_rand(000000, 999999);
        $carts = Cart::with(['product', 'user'])
                    ->where('users_id', Auth::user()->id)
                    ->get();


        // Transaction create
        $transaction = Transaction::create([
            'users_id' =>  Auth::user()->id,
            'inscurance_price' =>   0,
            'shipping_price' =>  0,
            'total_price' =>  $request->total_price,
            'transaction_status' =>  'PENDING',
            'code' =>  $code,
        ]);

        // Transaction detail crete
        foreach ($carts as $cart) {
            $trx = 'TRX-' . mt_rand(000000, 999999);

            TransactionDetail::create([
                'transactions_id' =>  $transaction->id,
                'products_id' =>  $cart->product->id,
                'price' => $cart->product->price,
                'shipping_status' =>  'PENDING',
                'resi' =>  '',
                'code' =>  $trx,
            ]);
        }

        // Delete cart setelah checkout
        Cart::where('users_id', Auth::user()->id)->delete();

        // Cek sudah benar / tidak
        // return dd($transaction);

        // midtrans, panggil di file config
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        $midtrans = [
            'transaction_details' => [
                'order_id' => $code,
                'gross_amount' => (int) $request->total_price,
            ],
            'costumer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'phone' => Auth::user()->phone_number,
            ],
            'enabled_payments' => [
                'gopay', 'permata_va', 'bank_transfer'
            ],
            'vtweb' => [],
            
        ];

        try {
            // Get Snap Payment Page URL
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
            
            // Redirect to Snap Payment Page
            // header('Location: ' . $paymentUrl);
            return redirect($paymentUrl);
          }
          catch (Exception $e) {
            echo $e->getMessage();
          }

    }



    public function callback(Request $request)
    {
        // Set konfigurasi midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // Instance midtrans notification
        $notification = new Notification();

        // Assign ke variable untuk memudahkan coding
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;

        // Cari transaksi berdasarkan ID
        $transaction = Transaction::findOrFail($order_id);

        // Handle notification status
        if($status == 'capture' ){
            if($type == 'credit_card'){
                if($fraud == 'challenge') {
                    $transaction->status = 'PENDING';
                }
                else{
                    $transaction->status = 'SUCCESS';
                }
            }
        }
        
        else if ($status == 'settlement'){
            $transaction->status = 'SUCCESS';
        }

        else if ($status == 'pending'){
            $transaction->status = 'PENDING';
        }
        else if ($status == 'deny'){
            $transaction->status = 'CANCELLED';
        }
        else if ($status == 'expire'){
            $transaction->status = 'CANCELLED';
        }
        else if ($status == 'cancel'){
            $transaction->status = 'CANCELLED';
        }

        // Simpang transaksi
        $transaction->save();
    }


}