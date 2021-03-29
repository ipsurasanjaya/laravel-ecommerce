<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Transaction;
use App\Cart;
use App\TransactionDetail;

use Exception;

use Veritrans_Snap;
use Veritrans_Config;
use Veritrans_Notification;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        //save users data
        $user = Auth::user();
        $user->update($request->except('total_price'));

        //process checkout
        $code = 'STORE-' . mt_rand(00000, 99999);
        $carts = Cart::with(['product', 'user'])
                    ->where('users_id', Auth::user()->id)
                    ->get();
    
        //transaction create
        $transaction = Transaction::create([
            'users_id' => Auth::user()->id,
            'insurance_price' => 0,
            'shipping_price' => 0,
            'total_price' => $request->total_price,
            'transaction_status' => 'PENDING',
            'code' => $code,
        ]);

        foreach ($carts as $cart) {
            $trx = 'TRX-' . mt_rand(00000, 99999);
            TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'products_id' => $cart->product->id,
                'price' => $cart->product->price,
                'shipping_status' => 'PENDING',
                'resi' => '',
                'code' => $code,
            ]);
        }

        //delete cart data
        Cart::where('users_id', Auth::user()->id)->delete();

        //konfigurasi midtrans
        Veritrans_Config::$serverKey = 'SB-Mid-server-J6OFKenl3nZinJeb9obUIBpo';
        Veritrans_Config::$isProduction = false;
        Veritrans_Config::$isSanitized = true;
        Veritrans_Config::$is3ds = true;
        //Array kirim ke midtrans       
        $midtrans = [
            'transaction_details' => [
                'order_id' => $code,
                'gross_amount' => (int) $request->total_price,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
            'enabled_payments' => [
                'gopay', 'permata_va', 'bca_klikpay'
            ],
            'vtweb' => []
        ];

        try {
            $paymentUrl = Veritrans_Snap::createTransaction($midtrans)->redirect_url;
            return redirect($paymentUrl);
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function callback(Request $request)
    {

    }
}
