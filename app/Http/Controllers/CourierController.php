<?php

namespace App\Http\Controllers;

use App\Courier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourierController extends Controller
{
    public function index()
    {
        $data = Courier::paginate(10);
        return view('admin.courier',compact('data'));
    }

    public function insertPage(){
        return view('admin.courier_insert');
    }

    public function updatePage($id){
        return view('admin.courier_update',compact('id'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'price' => 'numeric|min:3000'
        ]);

        if(!$validator->fails()) {
            $courier = new Courier();
            $courier->name = $request->name;
            $courier->price = $request->price;
            $courier->save();
            return redirect('admin/manage-courier');
        }
        else
            return redirect()->back()->withErrors($validator->errors());
    }

    public function update(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'price' => 'required|numeric|min:3000'
        ]);

        if(!$validator->fails()){
            $courier = Courier::find($id);
            $courier->name = $request->name;
            $courier->price = $request->price;
            $courier->save();
            return redirect('admin/manage-courier');
        }
        else
            return redirect()->back()->withErrors($validator->errors());

    }

    public function destroy($id)
    {
        Courier::destroy($id);
        return redirect()->back();
    }
}
