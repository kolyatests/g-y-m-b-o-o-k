{{--!вывод всех упраж по параметрам с фото     --}}
@extends('layouts.master')
@section('content')
    <div class="row content-main">
        <div class="col-lg-12">
            <div>
                <select name="gender" id="gender2" class="options">
                    <option value="0">Выберите тренировку</option>
                    <option value="999999">{{ __('gym.my_workout_share_head')}}</option>
                    @foreach(\App\Models\Sport\Genders::Lang()->get() as $gender)
                        <option value="{{$gender->code}}">{{$gender->name}}</option>
                    @endforeach
                </select>
            </div>
            <div id="divplace">
                <select name="place" id="place2" class="options">
                    <option value="0">Выберите место</option>
                    @foreach(\App\Models\Sport\Places::Lang()->get() as $place)
                        <option value="{{$place->code}}">{{$place->name}}</option>
                    @endforeach
                </select>
            </div>
            <div id="divspecific">
                <select name="specific" id="specific2" class="options">
                    <option value="0">Выберите ---</option>
                    @foreach(\App\Models\Sport\Specific::lang()->get() as $specific)
                        <option value="{{$specific->code}}">{{$specific->name}}</option>
                    @endforeach
                </select>
            </div>
            <div id="divdifficulty">
                <select name="difficulty" id="difficulty2" class="options">
                    <option value="0">Выберите сложность</option>
                    @foreach(\App\Models\Sport\Difficulty::lang()->get() as $difficulty)
                        <option value="{{$difficulty->code}}">{{$difficulty->name}}</option>
                    @endforeach
                </select>
            </div>
            <div id="divpurpose">
                <select name="purpose" id="purpose2" class="options">
                    <option value="0">Выберите цель</option>
                    @foreach(\App\Models\Sport\Purpose::lang()->get() as $purpose)
                        <option value="{{$purpose->code}}">{{$purpose->name}}</option>
                    @endforeach
                </select>
            </div>
            <div id="divday">
                <select name="day" id="day2" class="options">
                    <option value="0">Выберите кол. дней</option>
                    @foreach([2, 3, 4, 5] as $day)
                        <option value="{{$day}}">{{$day}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <br>
            <div id="data2">
            </div>
            <br>
            <br>
        </div>
    </div>
@endsection
