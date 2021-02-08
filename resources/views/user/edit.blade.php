{{--#получить профиль юзера--}}
@extends('layouts.master-book')
@section('content')
    <div class="leave-comment mr0">
        <h3 class="text-uppercase text-center">Мой профиль</h3>
        <br>
        <img src="{{ Storage::url($user->getImage())}}" alt="" class="profile-image" width="100">
        <form class="form-horizontal contact-form" role="form" method="post" action="{{route('profile.update')}}"
              enctype="multipart/form-data">
            {{csrf_field()}}
            @include('layouts.errors')
            <div class="form-group">
                <div class="col-md-12">
                    <input type="password" class="form-control" id="password" name="password"
                           placeholder="password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <input type="text" class="form-control" id="first_name" name="first_name"
                           placeholder="Имя" value="{{$user->first_name}}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <input type="text" class="form-control" id="last_name" name="last_name"
                           placeholder="Фамилия" value="{{$user->last_name}}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <input type="text" class="form-control" id="location" name="location"
                           placeholder="Откуда" value="{{$user->location}}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <select name="gender" class="form-control ">
                        <option value="">Ваш пол</option>
                        <option value="m" {{ auth()->user()->gender === 'm' ? 'selected' : '' }}>Мужчина</option>
                        <option value="f" {{ auth()->user()->gender === 'f' ? 'selected' : '' }}>Женщина</option>
                    </select>
                </div>
            </div>
            <input type="file" class="form-file-input col-md-12 " id="image" name="avatar">
            <button type="submit" class="btn btn-outline-secondary btn-lg btn-block mb-4">Обновить</button>
        </form>
    </div>
@endsection
