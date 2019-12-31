<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    //
    public function index(){
        return view('auth.register');
    }

    public function doRegister(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|alpha_dash|min:5|confirmed', // confirmed akan cek si confirm pass sama atau kagak
            'phone' => 'required|integer|digits_between:8,12',
            'address' => 'required|min:10',
            'gender' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png'
        ]);
        // jika validasi kagak gagal
        if(!$validator->fails()){
            $image = $request->file('image');
            $imagename = time().'.'.$image->getClientOriginalName();
            $dest = 'public';
            $image->storeAs($dest,$imagename);

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->image = $imagename;
            $user->role = 'Member';
            $user->save();
            //kembali ke login page
            return redirect(url('login'));
        }
        else{
            // balik ke register page dengan error
            return redirect()->back()->withErrors($validator->errors());
        }
    }
}
