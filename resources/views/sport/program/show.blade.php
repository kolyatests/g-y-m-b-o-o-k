{{--!просмотр дня тренировки ,что-бы потом добавить программу в мои программы     1--}}
@extends('layouts.master')
@section('content')
    <div class="row content-main ">
        <div class="col-12 ">
            @include('layouts.errors')
            <div class="card">
                <div class="card-header text-center ">
                    <a class="btn btn-outline-secondary btn-lg btn-block"
                       href="{{route('sport.program.week', $exercises->first()->program->programWeek->program_week_id)}}">
                        <h3>{{$exercises->first()->program->programWeek->name}}</h3>
                    </a>
                </div>
                <div class="card-body">
                    @if($exercises->first()->program->description)
                        <div class="card card-body  text-center mb-4"><h4>{{$exercises->first()->program->description}}</h4></div>
                    @endif
                    <div class="row ">
                        <div class="col-md-4">
                            <div class="card card-body  text-center mb-4"><h4>{{$exercises->first()->program->name}}</h4></div>
                        </div>
                        <div class="col-md-8">
                            @foreach($exercises as $exercise)
                                @if($exercise)
                                    <div class="row mb-2">
                                        <div class="col-2 d-none d-md-block">
                                        </div>
                                        <div class="col-md-10">
                                            <div class="card card-body">
                                                <div class="row">
                                                    <div class="col-9">
                                                        <h3>{{$exercise->exercises()->value('name')}}</h3>
                                                        <h4>{{$exercise->description}}</h4>
                                                    </div>
                                                    <div class="col-3 align-self-center">
                                                        <img height="72" width="72"
                                                             class="bg-light shadow-lg float-right   p-1" alt=""
                                                             src="{{ Storage::url('image/menu/menu_' . $exercise->exercise_id . '.png')}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
@endsection
