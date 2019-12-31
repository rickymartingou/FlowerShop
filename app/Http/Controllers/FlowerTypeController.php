<?php

namespace App\Http\Controllers;

use App\FlowerType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FlowerTypeController extends Controller
{
    public function index()
    {
        $data = FlowerType::paginate(10);
        return view('admin.flower_type',compact('data'));
    }

    public function insertPage(){
        return view('admin.flower_type_insert');
    }

    public function updatePage($id){
        return view('admin.flower_type_update',compact('id'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:4|unique:flower_types,name'
        ]);

        if(!$validator->fails()) {
            $type = new FlowerType();
            $type->name = $request->name;
            $type->save();
            return redirect('admin/manage-flower-type');
        }
        else
            return redirect()->back()->withErrors($validator->errors());
    }

    public function update(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:4|unique:flower_types,name'
        ]);

        if(!$validator->fails()){
            $type = FlowerType::find($id);
            $type->name = $request->name;
            $type->save();
            return redirect('admin/manage-flower-type');
        }
        else
            return redirect()->back()->withErrors($validator->errors());

    }

    public function destroy($id)
    {
        FlowerType::destroy($id);
        return redirect()->back();
    }
}
