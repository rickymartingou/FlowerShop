@extends('layouts.app')
@section('content')
    <div class="container p-3">
        <form method="post" action={{url('/admin/manage-courier/store')}}>
            {{csrf_field()}}
            <h2>Insert</h2>
            <table class="table table-borderless">
                <tr>
                    <td>
                        <input type="text" class="form-control" name="name" placeholder="Courier Name">
                        <input type="text" class="form-control" name="price" placeholder="Shipping Cost">
                        <input type="submit" id="input_button" class="btn btn-primary" value="Insert">
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
