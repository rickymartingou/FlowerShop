@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('User Profile') }}</div>

                    <div class="card-body">
                        <form>
                            <div class="text-center m-3" >
                                <img class="img-fluid" width="200px" height="200px" src={{asset('storage/'.$data->image)}} alt="">
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input disabled id="name" type="text" class="form-control" name="name" value={{$data->name}} autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input disabled id="email" type="text" class="form-control" name="email" value="{{$data->email}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input disabled id="phone" type="text" class="form-control" name="phone" value="{{$data->phone}}" autocomplete="phone" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                                <div class="col-md-6">
                                    <label for="gender-male">
                                        <input class="form-control" disabled id="gender" type="text" name="gender" value="{{$data->gender}}">
                                    </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                <textarea disabled class="form-control" rows="5" id="address" name="address"
                                >{{ old('address') }}{{$data->address}}</textarea>
                                </div>
                            </div>
                        </form>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href={{url('profile/update/'.$id)}}>
                                    <button class="btn btn-success">
                                        {{ __('Update') }}
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
