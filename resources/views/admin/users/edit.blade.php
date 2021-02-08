@extends('admin.layout')

@section('content')


    <div class="content-wrapper">
        {{--    @include('admin.content-header')--}}


        <section class="content">
            {{Form::open([
                'route' => ['admin.users.update', $user->id],
                'method' => 'put',
                'files' => true
            ])}}

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('gym.title_add')}}</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Имя</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   id="exampleInputEmail1" name="name" placeholder="" value="{{$user->name}}">
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                   id="exampleInputEmail1" name="email" placeholder="" value="{{$user->email}}">
                            @error('email')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Пароль</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   id="exampleInputEmail1" name="password" placeholder="">
                            @error('password')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <img src="{{ Storage::url($user->getImage())}}" alt="" width="200" class="img-responsive">
                            <label for="exampleInputFile">Аватар</label>
                            <input type="file" name="avatar" id="exampleInputFile">
                        </div>
                        <div class="form-group">
                            <label for="admin">юзер</label>
                            <input type="radio" name="role" value="0" @if($user->role == 0) checked @endif>
                            <br>
                            <label for="trainer">тренер</label>
                            <input type="radio" name="role" value="2" @if($user->role == 2) checked @endif>
                            <br>
                            <label for="trainer">модератор</label>
                            <input type="radio" name="role" value="3" @if($user->role == 3) checked @endif>
                            <br>
                            <label for="trainer">менеджер</label>
                            <input type="radio" name="role" value="4" @if($user->role == 4) checked @endif>
                            <br>
                            <label for="trainer">админ</label>
                            <input type="radio" name="role" value="1" @if($user->role == 1) checked @endif>
                        </div>
                        <div class="form-group">
                            <label for="trainer">бан</label>
                            <input type="checkbox" name="ban" @if($user->ban == 1) checked @endif>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <button class="btn btn-warning pull-right">Изменить</button>
                </div>

            </div>

            {{Form::close()}}
        </section>

    </div>

@endsection
