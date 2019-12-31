@extends('layouts.app')
@section('content')
    <div class="container p-3">
        <h2>My Cart</h2>
        @if($carts==null)
            <h2>There is no data yet.</h2>
        @else
            <table id="table" class="table table-dark table-striped">
                <thead>
                <tr>
                    <th>Flower Image</th>
                    <th>Flower Name</th>
                    <th>Flower Price</th>
                    <th>Flower Quantity</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($carts as $cart)
                    <tr>
                        <td id="name">
                            <img width="100px" height="100px" src={{asset('storage/'.$cart->flower->image)}} alt="">
                        </td>
                        <td id="name">{{$cart->flower->name}}</td>
                        <td id="name">{{$cart->flower->price}}</td>
                        <td id="name">{{$cart->quantity}}</td>
                        <td>
                            <a href={{url('remove-cart/'.$cart->flower_id)}}>
                                <button class="btn btn-danger">Remove</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total Price</td>
                    <td>{{$total->Total}}</td>
                </tr>
            </table>
            <form action={{url('/checkout/'.$carts[0]->cart_id)}} method="post">
                {{csrf_field()}}
                <table class="table table-borderless">
                    <tr>
                        <td>Courier</td>
                        <td>
                            <div>
                                <select class="form-control" name="courier">
                                    <option>--Select Courier--</option>
                                    @foreach($cour as $courier)
                                        <option value={{$courier->id}}>{{$courier->name.' - Rp.'.$courier->price}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="btn btn-primary" type="submit" value="Checkout">
                        </td>
                    </tr>
                </table>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        @endif
    </div>
@endsection
