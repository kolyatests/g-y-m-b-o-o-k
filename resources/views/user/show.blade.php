{{--#получить профиль юзера--}}
@extends('layouts.master-book')
@section('content')
    <div class="leave-comment mr0">
        <h3 class="text-uppercase text-center">Профиль</h3>
        <br>
        <img src="{{ Storage::url($user->getImage())}}" alt="" class="profile-image">
        <h3>
            Name: {{$user->name}}<br>
            Email:{{$user->email}}<br>
            First name: {{$user->first_name}}<br>
            Last name: {{$user->last_name}}<br>
            Location: {{$user->location}}<br>
            Gender:
            @if($user->gender === 'm') Мужчина
            @elseif($user->gender === 'f') Женщина
            @endif
        </h3>
    </div>
@endsection
