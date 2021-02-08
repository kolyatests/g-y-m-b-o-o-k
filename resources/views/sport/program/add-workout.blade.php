{{--!добавляем тренировку в мои программы     1--}}
@extends('layouts.master')
@section('content')
    <div class="row content-main">
        <div class="col-lg-12">
            @include('layouts.errors')
            <div class="card">
                <div class="card-header text-center ">
                    <h4>{{$program->name}}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @foreach($program->programs as $day)
                                <a class="btn btn-outline-secondary btn-lg btn-block mb-2"
                                   href="{{route('sport.program.day',$day->id)}}">
                                    <p>{{($day->name)}}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <br>
                    <a class="btn btn-outline-secondary btn-lg btn-block"
                       href="{{route('sport.program.add', $day->program_week_id)}}">
                        <h4>{{ __('gym.title_add')}}</h4>
                    </a>
                </div>
            </div>
            <br>
            <br>
        </div>
    </div>
@endsection
