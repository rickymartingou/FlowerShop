@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <img width="200px" height="300px" src={{asset('storage/'.$flower->image)}} class="card-img-top" alt="...">
            <h3>{{$flower->name}}</h3>
            <p>{{$flower->description}}</p>
            <p>{{'Rp.'.$flower->price}}</p>
            <p>{{'Stock : '.$flower->stock}}</p>
            @if(\Illuminate\Support\Facades\Auth::check())
                <form action="/add-to-cart" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value={{$flower->id}}>
                    <input type="number" name="quantity">
                    <button type="submit" class="btn btn-primary">Add to cart</button>
                </form>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            @endif
        </div>
    </div>
@endsection
