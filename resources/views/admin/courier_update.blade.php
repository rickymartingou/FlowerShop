@extends('layouts.app')
@section('content')
    <div class="container p-3">
        <form method="post" action={{'/admin/manage-courier/doUpdate/'.$id}}>
            {{csrf_field()}}
            <h2>Update</h2>
            <table class="table table-borderless">
                <tr>
                    <td>
                        <input type="text" class="form-control" name="name" placeholder="Courier Name">
                        <input type="text" class="form-control" name="price" placeholder="Shipping Cost">
                        <input type="submit" id="input_button" class="btn btn-success" value="Update">
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
