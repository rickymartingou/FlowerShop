<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartDetail;
use App\Transaction;
use App\TransactionDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index(){
        $headers = Transaction::where('user_id','=',auth()->user()->id)->get();
        $total=0;
        return view('transaction_history',compact('headers','total'));
    }

    public function indexAdmin(){
        $headers = Transaction::all();
        $total=0;
        return view('transaction_history',compact('headers','total'));
    }

    public function store(Request $request, $cartId){
        $validator = Validator::make($request->all(), [
            'courier' => 'required|not_in:--Select Courier--'
        ]);

        if(!$validator->fails()){
            $transaction = new Transaction();
            $transaction->user_id = auth()->user()->id;
            $transaction->date = Carbon::now();
            $transaction->courier_id = $request->courier;
            $transaction->save();

            $details = CartDetail::where('cart_id','=',$cartId)->get();

            foreach ($details as $detail){
                $transactionDetail = new TransactionDetail();
                $transactionDetail->transaction_id = $transaction->id;
                $transactionDetail->flower_id = $detail->flower_id;
                $transactionDetail->quantity = $detail->quantity;
                $transactionDetail->save();
            }
            $carts = Cart::all();
            foreach ($carts as $cart) {
                $cart->detail()->delete();
            }
            Cart::destroy($cartId);

            return redirect('/');
        }
        else{
            return redirect()->back()->withErrors($validator->errors());
        }


    }
}
