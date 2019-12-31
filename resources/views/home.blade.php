@extends('layouts.app')

@section('content')
    <div class="form-group d-flex m-md-3">
        <span id="time"></span>
    </div>
    <script>
        console.log('ea')
        var myTime = document.getElementById('time');
        setInterval(function(){
            var date = new Date();
            myTime.innerHTML = date;
        }, 1000)
    </script>
    <form action={{url('/')}} method="get">
        <div class="form-group d-flex m-md-3">
            <input type="text" placeholder="Try Rose..." class="form-control w-25" name="searching">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
    <div class="container">
        <div class="row justify-content-center">
            @foreach($data as $flower)
                <div class="card" style="width: 18rem;">
                    <img width="300px" height="300px" src={{asset('storage/'.$flower->image)}} class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$flower->name}}</h5>
                        <p class="card-text">{{$flower->description}}</p>
                        <a class="btn btn-primary" href={{url('detail/'.$flower->id)}} >Detail</a>
                        @if(\Illuminate\Support\Facades\Auth::check())
                            <form action="/add-to-cart" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value={{$flower->id}}>
                                <input type="hidden" name="quantity" value={{1}}>
                                <button type="submit" class="btn btn-primary">Add to cart</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <div class="w-25 m-auto">
            {{ $data->links() }}
        </div>
    </div>
@endsection
