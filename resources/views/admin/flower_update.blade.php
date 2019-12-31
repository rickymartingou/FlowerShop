@extends('layouts.app')
@section('content')
    <div class="container p-3">
        <form enctype="multipart/form-data" method="post" action={{url('/admin/manage-flower/doUpdate/'.$id)}}>
            {{csrf_field()}}
            <h2>Update</h2>
            <table class="table table-borderless">
                <tr>
                    <td>
                        <div class="form-group row">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                        <div class="form-group row">
                            <select class="form-control" name="type">
                                <option>--Select Type--</option>
                                @foreach($data as $type)
                                    <option value={{$type->id}}>{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <input type="text" class="form-control" name="price" placeholder="Price">
                        </div>
                        <div class="form-group row">
                            <input type="text" class="form-control" name="description" placeholder="Description">
                        </div>
                        <div class="form-group row">
                            <input type="text" class="form-control" name="stock" placeholder="Stock">
                        </div>
                        <div class="form-group row">
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="submit" id="input_button" class="btn btn-success" value="Update">
                            </div>
                        </div>
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
    </div>
@endsection
