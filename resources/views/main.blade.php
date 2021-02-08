{{--!начальная страница тренировок     --}}
@extends('layouts.master2')
@section('content')
    <div class="row content-main">
        <div class="col-lg-6 text-center">
            @include('layouts.errors')
            <a class="btn btn-outline-secondary btn-lg btn-block mb-2" href="{{route('sport.calendar')}}">
                <h4>{{ __('gym.menu_calendar')}}</h4>
            </a>
            <a class="btn btn-outline-secondary btn-lg btn-block mb-2" href="{{route('sport.my.program.index')}}">
                <h4>{{ __('gym.my_workout_share_head')}}</h4>
            </a>
            <div class="gym-picture text-center">
                <img alt="" src="{{ Storage::url('image/muscles/muscle_0.png') }}"/>
                @foreach($page['muscles'] as $muscle)
                    @if($muscle != 0 || $muscle != null)
                        <img alt="" class="overlay"
                             src="{{ Storage::url('image/muscles/muscle_' . $muscle . '.png')}}"/>
                    @endif
                @endforeach
            </div>
            @if($page['activityDays'] != null)
                <div class="card card-body  text-center mb-4"><h4>{{$page['activityDays']}}</h4></div>
            @endif
        </div>
        <div class="col-lg-6">
            @foreach($page['exercises'] as $exercise)
                @include('sport.card.exercise', compact('exercise'))
            @endforeach
            @if($page['exercises']->isNotEmpty())
                <a class="btn btn-outline-secondary btn-lg btn-block mb-4"
                   href="{{route('sport.calendar.gym.view', session('date', 0))}}">
                    <h4>{{ __('gym.develop_message_yes')}}</h4>
                </a>
            @endif
            <br><br><br><br><br><br>
        </div>
    </div>
    @php
        Debugbar::info('start');
    @endphp
@endsection
