<?php

namespace App\Http\Controllers;

use App\Flower;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->searching;
        $data = Flower::where('name','LIKE','%'.$query.'%')
            ->orWhere('description','LIKE','%'.$query.'%')
            ->paginate(10);
        $data->appends($request->only('searching'));
        return view('home', compact('data'));
    }

    public function detail($id){
        $flower = Flower::find($id);
        return view('detail_item',compact('flower'));
    }
}
