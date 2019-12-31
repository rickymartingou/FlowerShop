<?php

namespace App\Http\Controllers;

use App\Flower;
use App\FlowerType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FlowerController extends Controller
{
    public function index()
    {
        $data = Flower::paginate(10);
        return view('admin.flower',compact('data'));
    }

    public function insertPage(){
        $data = FlowerType::all();
        return view('admin.flower_insert',compact('data'));
    }

    public function updatePage($id){
        $data = FlowerType::all();
        return view('admin.flower_update',compact('id','data'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'type' => 'required|not_in:--Select Type--',
            'price' => 'required|numeric|min:10000',
            'description' => 'required|between:20,200',
            'stock' => 'required|numeric|gt:0',
            'image' => 'required|mimes:jpeg,jpg,png'
        ]);

        if(!$validator->fails()) {
            $image = $request->file('image');
            $imagename = time().'.'.$image->getClientOriginalName();
            $dest = 'public';
            $image->storeAs($dest,$imagename);

            $flower = new Flower();
            $flower->name = $request->name;
            $flower->price = $request->price;
            $flower->type_id = $request->type;
            $flower->description = $request->description;
            $flower->stock = $request->stock;
            $flower->image = $imagename;
            $flower->save();
            return redirect('admin/manage-flower');
        }
        else
            return redirect()->back()->withErrors($validator->errors());
    }

    public function update(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'type' => 'required|not_in:--Select Type--',
            'price' => 'required|numeric|min:10000',
            'description' => 'required|between:20,200',
            'stock' => 'required|numeric|gt:0',
            'image' => 'required|mimes:jpeg,jpg,png'
        ]);

        if(!$validator->fails()){
            $image = $request->file('image');
            $imagename = time().'.'.$image->getClientOriginalName();
            $dest = 'public';
            $image->storeAs($dest,$imagename);

            $flower = Flower::find($id);
            $flower->name = $request->name;
            $flower->price = $request->price;
            $flower->type_id = $request->type;
            $flower->description = $request->description;
            $flower->stock = $request->stock;
            $flower->image = $imagename;
            $flower->save();
            return redirect('admin/manage-flower');
        }
        else
            return redirect()->back()->withErrors($validator->errors());

    }

    public function destroy($id)
    {
        Flower::destroy($id);
        return redirect()->back();
    }
}
