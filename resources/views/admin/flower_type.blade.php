@extends('layouts.app')
@section('content')
    <div class="container p-3">
        <h2>Manage Flower Type</h2>
        <a href={{url('admin/manage-flower-type/insert')}}>
            <button style="margin-bottom: 20px" class="btn btn-primary">Insert New Flower Type</button>
        </a>
        @if(count($data)==0)
            <h2>There is no data yet.</h2>
        @else
            <table id="table" class="table table-dark table-striped">
                <thead>
                <tr>
                    <th>Type Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $type)
                    <tr>
                        <td style="display: none">{{$type->id}}</td>
                        <td id="name">{{$type->name}}</td>
                        <td>
                            <a href={{url('admin/manage-flower-type/update/'.$type->id)}}>
                                <button class="btn btn-success">Update</button>
                            </a>
                            {{--                        <button onclick="fill_data(event)">Update</button>--}}
                            {{--                        <script type="text/javascript">--}}
                            {{--                            function fill_data(e) {--}}
                            {{--                                e = event || window.event;--}}
                            {{--                                var data = [];--}}
                            {{--                                var target = e.srcElement || e.target;--}}
                            {{--                                while (target && target.nodeName !== "TR") {--}}
                            {{--                                    target = target.parentNode;--}}
                            {{--                                }--}}
                            {{--                                if (target) {--}}
                            {{--                                    var cells = target.getElementsByTagName("td");--}}
                            {{--                                    data.push(cells[0].innerHTML);--}}
                            {{--                                    data.push(cells[1].innerHTML);--}}
                            {{--                                }--}}
                            {{--                                document.getElementById("input_id").value = data[0];--}}
                            {{--                                document.getElementById("input_name").value = data[1];--}}
                            {{--                                document.getElementById("input_button").value = "Update";--}}
                            {{--                            }--}}
                            {{--                        </script>--}}
                            <a href={{url('admin/manage-flower-type/delete/'.$type->id)}}>
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
