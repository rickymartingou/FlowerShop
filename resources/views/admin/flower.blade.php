@extends('layouts.app')
@section('content')
    <div class="container p-3">
        <h2>Manage Flower</h2>
        <a href={{url('admin/manage-flower/insert')}}>
            <button style="margin-bottom: 20px" class="btn btn-primary">Insert New Flower</button>
        </a>
        @if(count($data)==0)
            <h2>There is no data yet.</h2>
        @else
            <table id="table" class="table table-dark table-striped">
                <thead>
                <tr>
                    <th>Flower Image</th>
                    <th>Flower Name</th>
                    <th>Flower Price</th>
                    <th>Flower Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $flower)
                    <tr>
                        <td>
                            <img width="100px" height="70px" src={{asset('storage/'.$flower->image)}} alt="">
                        </td>
                        <td id="name">{{$flower->name}}</td>
                        <td id="name">{{$flower->price}}</td>
                        <td id="name">{{$flower->description}}</td>
                        <td>
                            <a href={{url('admin/manage-flower/update/'.$flower->id)}}>
                                <button class="btn btn-success">Update</button>
                            </a>
                            <a href={{url('admin/manage-flower/delete/'.$flower->id)}}>
                                <button class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="w-25 m-auto">
                {{ $data->links() }}
            </div>
        @endif
    </div>
@endsection
