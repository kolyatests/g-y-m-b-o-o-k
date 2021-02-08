@extends('admin.layout')

@section('content')

    <div class="content-wrapper">
        {{--    @include('admin.content-header')--}}


        <section class="content">
            {{Form::open(['route' => 'admin.users.store', 'files' => true])}}

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('gym.title_add')}}</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Имя</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   id="exampleInputEmail1" placeholder=""
                                   value="{{old('name')}}">
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                   id="exampleInputEmail1" placeholder=""
                                   value="{{old('email')}}">
                            @error('email')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Пароль</label>
                            <input type="password" name="password"
                                   class="form-control @error('password') is-invalid @enderror" id="exampleInputEmail1"
                                   placeholder="">
                            @error('password')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Аватар</label>
                            <input type="file" name="avatar" id="exampleInputFile">

                            <p class="help-block"></p>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <button class="btn btn-success pull-right">{{ __('gym.choose_add_title')}}</button>
                </div>

            </div>

            {{Form::close()}}
        </section>

    </div>

@endsection
