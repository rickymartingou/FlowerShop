<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartDetail;
use App\Courier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index(){
        $cour = Courier::all();
        $cart = Cart::where('user_id', '=', auth()->user()->id)->first();
        if($cart!=null){
            $total = DB::table('cart_details')
                ->join('flowers','flowers.id','=','cart_details.flower_id')
                ->select(DB::raw('sum(quantity*price) as Total'))
                ->where('cart_id','=',$cart->id)
                ->first();
            $carts = CartDetail::where('cart_id','=',$cart->id)->get();
        }
        else{
            $total='';
            $carts=null;
        }
        return view('cart',compact('carts','total','cour'));
    }

    public function indexAdmin(){
        $carts = Cart::all();
        return view('cart',compact('carts'));
    }

    public function remove($id){
        $cart = CartDetail::where('flower_id','=',$id)->first();
        $remaining = CartDetail::where('cart_id','=',$cart->cart_id)->get();
        CartDetail::where('flower_id','=',$id)->delete();
        if(count($remaining)==1){
            Cart::destroy($cart->cart_id);
        }
        return redirect()->back();
    }

    public function addToCart(Request $request){
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|gt:0'
        ]);

        if(!$validator->fails()) {
            $previous = Cart::where('user_id', '=', auth()->user()->id)->first();

            if ($previous == null) {
                $cart = new Cart();
                $cart->user_id = auth()->user()->id;
                $cart->save();

                $detail = new CartDetail();
                $detail->cart_id = $cart->id;
                $detail->flower_id = $request->id;
                $detail->quantity = $request->quantity;
                $detail->save();
            } else {
                $exist = CartDetail::where('flower_id', '=', $request->id)->first();
                if ($exist == null) {
                    $detail = new CartDetail();
                    $detail->cart_id = $previous->id;
                    $detail->flower_id = $request->id;
                    $detail->quantity = $request->quantity;
                    $detail->save();
                } else {
                    CartDetail::where('flower_id', '=', $request->id)
                        ->update(['quantity' => $exist->quantity + $request->quantity]);
                }

            }
            return redirect('/');
        }
        return redirect()->back()->withErrors($validator->errors());
    }
}
