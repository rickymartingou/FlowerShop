@extends('layouts.app')
@section('content')
    <div class="container p-3">
        <h2>My Transaction History</h2>
        @if(count($headers)==0)
            <h2>There is no data yet.</h2>
        @else
            @foreach($headers as $header)
                <table class="table table-borderless">
                    <tr>
                        <td>Transaction ID : {{$header->id}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Transaction Date : {{$header->date}}</td>
                    </tr>
                    <tr>
                        <td>Member Name : {{$header->user->name}}</td>
                    </tr>
                    <tr>
                        <td>Courier : {{$header->courier->name}}</td>
                    </tr>
                </table>
                <table id="table" class="table table-dark table-striped">
                    <thead>
                    <tr>
                        <th>Flower Image</th>
                        <th>Flower Name</th>
                        <th>Flower Price</th>
                        <th>Flower Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($header->detail as $transaction)
                        <tr>
                            <td id="name">
                                <img width="100px" height="100px" src={{asset('storage/'.$transaction->flower->image)}} alt="">
                            </td>
                            <td id="name">{{$transaction->flower->name}}</td>
                            <td id="name">{{$transaction->flower->price}}</td>
                            <td id="name">{{$transaction->quantity}}</td>
                            <span style="display: none">
                            {{$total += $transaction->flower->price*$transaction->quantity}}
                        </span>
                        </tr>
                    @endforeach
                    </tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Total Price</td>
                        <td>{{$total}}</td>
                    </tr>
                </table>
                <span style="display: none">
                    {{$total=0}}
                </span>
            @endforeach
        @endif
    </div>
@endsection
