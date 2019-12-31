<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function index(){
        $data = User::all();
        return view('admin.user',compact('data'));
    }

    public function profile(){
        $id = \auth()->id();
        $data = User::find($id);
        return view('profile',compact('data','id'));
    }

    public function updatePage($id){
        return view('admin.user_update',compact('id'));
    }

    public function update(Request $request,$id){
        $prev = str_replace('http://127.0.0.1:8000/','',url()->previous());
        $prev = substr($prev,0,17);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|integer|digits_between:8,12',
            'address' => 'required|min:10',
            'gender' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png'
        ]);

        if(!$validator->fails()){
            $image = $request->file('image');
            $imagename = time().'.'.$image->getClientOriginalName();
            $dest = 'public';
            $image->storeAs($dest,$imagename);

            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->image = $imagename;
            $user->save();

            if($prev == 'admin/manage-user'){
                return redirect("admin/manage-user");
            }
            else{
                return redirect('profile');
            }

        }
        else
            return redirect()->back()->withErrors($validator->errors());

    }

    public function destroy($id){
        User::destroy($id);
        return redirect()->back();
    }
}
