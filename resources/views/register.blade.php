@extends('layouts.master-guest')
@section('content')
    <div class="row content-main">
        <div class="col-12  text-center">
            <img src="{{ Storage::url('image/gymbook.jpg')}}" alt="GYMBOOK">
            <hr>
            @if(Auth::guest())
                <div class="card">
                    <div class="card-header text-center ">
                         @include('layouts.errors')
                        <div class="row ">
                            <div class="col-lg-6 text-center mb-3">
                                <a class="btn btn-outline-secondary btn-lg btn-block" href="{{route('login')}}">
                                    <h4>Login</h4>
                                </a>
                            </div>
                            <div class="col-lg-6 text-center">
                                <a class="btn btn-outline-secondary btn-lg btn-block" href="#">
                                    <h4>Register</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <form method="post" action="{{route('register')}}">
                            {{csrf_field()}}
                            <div class="form-group col-12">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                       name="name" value="{{old('name')}}"
                                       placeholder="name" maxlength="100">
                                @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group col-12">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                       name="email" value="{{old('email')}}"
                                       placeholder="Email" maxlength="100">
                                @error('email')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="col-12">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                           id="password" name="password"
                                           placeholder="password" maxlength="100">
                                    @error('password')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            @if(app()->env === 'production')
                            <div class="mb-3 col-12">
                                {!! NoCaptcha::display() !!}
                                @error('g-recaptcha-response')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            @endif
                            <button type="submit" class="btn btn-outline-secondary btn-lg btn-block  mb-3">Register
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
@if( app()->env === 'production')
    @push('scripts')
        {!! \Anhskohbo\NoCaptcha\Facades\NoCaptcha::renderJs() !!}
    @endpush
@endif
