@extends('layouts.app')
@section('content')
    <div class="container p-3">
        <h2>Manage Users</h2>
        @if(count($data)==0)
            <h2>There is no data yet.</h2>
        @else
            <table id="table" class="table table-dark table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $user)
                    <tr>
                        <td style="display: none">{{$user->id}}</td>
                        <td id="name">{{$user->name}}</td>
                        <td id="name">{{$user->email}}</td>
                        <td id="name">{{$user->role}}</td>
                        <td>
                            <a href={{url('admin/manage-user/update/'.$user->id)}}>
                                <button class="btn btn-success">Update</button>
                            </a>
                            <a href={{url('admin/manage-user/delete/'.$user->id)}}>
                                <button class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
