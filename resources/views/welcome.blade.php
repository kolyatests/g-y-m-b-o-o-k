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
                                <a class="btn btn-outline-secondary btn-lg btn-block" href="#">
                                    <h4>Login</h4>
                                </a>
                            </div>
                            <div class="col-lg-6 text-center">
                                <a class="btn btn-outline-secondary btn-lg btn-block" href="{{route('register.form')}}">
                                    <h4>Register</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('login.post')}}">
                            {{csrf_field()}}
                            <div class="form-group col-12">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                       name="email" value="{{old('email')}}"
                                       placeholder="Email">
                                @error('email')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="col-12">
                                    <input type="password" class="form-control  @error('password') is-invalid @enderror"
                                           id="password" name="password"
                                           placeholder="password">
                                    @error('password')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            @if( app()->env === 'production')
                            <div class="mb-3 col-12">
                                {!! NoCaptcha::display() !!}
                                @error('g-recaptcha-response')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            @endif
                            <button type="submit" class="btn btn-outline-secondary btn-lg btn-block mb-3">Login</button>
                        </form>
                    </div>
                </div>
            @endif
            @if( app()->env === 'production')
            <div class="form-group">
                <div class="col-md-12 col-md-offset-4">
                    <a class="btn" href="{{ url('/auth/github') }}"><i class="fab fa-github"></i> Github</a>
                    <a class="btn" href="{{ url('/auth/facebook') }}"><i class="fab fa-facebook"></i> Facebook</a>
                    <a class="btn " href="{{ url('/auth/google') }}"><i class="fab fa-google"></i> Google</a>
                    <a class="btn " href="https://t.me/gym_book_bot"><i class="fab fa-telegram"></i> Telegram</a>
                    <a class="btn " href="viber://pa?chatURI=GymBookBot&text=Войти!"><i class="fab fa-viber"></i> Viber</a>
                </div>
            </div>
            @endif


            <h4>
                @if(!Auth::guest())
                    <div class="links">
                        <a href="{{ route('sport.main') }}">Основная</a>
                        @if(auth()->user()->role == 1)<a href="{{ route('admin.users.index') }}">admin</a> @endif
                        @if(auth()->user()->role == 2)<a href="{{ route('trainer.users.index') }}">trainer</a> @endif
                        @if(auth()->user()->role == 3)<a href="{{ route('book.moderator') }}">moderator</a> @endif
                        @if(auth()->user()->role == 4)<a href="{{ route('shop.manager.users') }}">manager</a> @endif

                        @if(auth()->user()->role == 1)<a href="{{ route('admin.reset') }}">restart</a>@endif
                        @if(auth()->user()->role == 1)<a target="_blank"href="{{ route('admin.routes') }}">routes</a>@endif
                        @if(auth()->user()->role == 1)<a href="{{ route('admin.down.app') }}">downApp</a>@endif
                        @if(auth()->user()->role == 1)<a href="{{ route('admin.up.app') }}">upApp</a>@endif
                    </div>
                @endif
                @if(!Auth::guest()&&auth()->user()->role == 1)
                    <a target="_blank" href="{{ route('login.as.user', ['']) }}">admin</a><br>
                    <a target="_blank" href="{{ route('login.as.user', ['']) }}">trainer1</a><br>
                    <a target="_blank" href="{{ route('login.as.user', ['']) }}">trainer2</a><br>
                    <a target="_blank" href="{{ route('login.as.user', ['']) }}">moderator</a><br>
                    <a target="_blank" href="{{ route('login.as.user', ['']) }}">manager</a><br>
                    <a target="_blank" href="{{ route('login.as.user', ['']) }}">user5</a><br>
                    <a target="_blank" href="{{ route('login.as.user', ['']) }}">user6</a><br>
                @endif
            </h4>
        </div>
    </div>
@endsection
@if( app()->env === 'production')
@push('scripts')
    {!! \Anhskohbo\NoCaptcha\Facades\NoCaptcha::renderJs() !!}
@endpush
@endif
