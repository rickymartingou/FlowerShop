@extends('layouts.app')
@section('content')
    <div class="container p-3">
        <h2>Manage Courier</h2>
        <a href={{url('admin/manage-courier/insert')}}>
            <button style="margin-bottom: 20px" class="btn btn-primary">Insert New Courier</button>
        </a>
        @if(count($data)==0)
            <h2>There is no data yet.</h2>
        @else
            <table id="table" class="table table-dark table-striped">
                <thead>
                <tr>
                    <th>Courier Name</th>
                    <th>Shipping Cost</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $courier)
                    <tr>
                        <td id="name">{{$courier->name}}</td>
                        <td id="name">{{$courier->price}}</td>
                        <td>
                            <a href={{url('admin/manage-courier/update/'.$courier->id)}}>
                                <button class="btn btn-success">Update</button>
                            </a>
                            <a href={{url('admin/manage-courier/delete/'.$courier->id)}}>
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
