{{--!в мою тренировку в день добавляем упражнение     --}}
@extends('layouts.master')
@section('content')
    <div class="row content-main ">
        <div class="col-12 ">
            @include('layouts.errors')
            <a id="toggleLink" href="javascript:void(0);" onclick="viewdiv('mydiv');">
                <img src="{{ Storage::url('image/icons8-inscription-50.png')}}" width="50" height="50"
                     alt="{{ __('gym.edit')}}"
                     title=""/> </a>
            <div class="card">
                <div class="card-header text-center ">
                    @if ($day->userTrainings)
                        <a class="btn btn-outline-danger btn-lg btn-block mb-2"
                           href="{{route('sport.gym.start', $day->id)}}">
                            <h4>{{ __('gym.training_play_active_title')}}</h4>
                        </a>
                    @else
                        <div class="btn btn-outline-danger btn-lg btn-block mb-2"><h4>{{ __('gym.title_add')}}</h4>
                        </div>
                    @endif
                </div>
                <div class="card-body col-sm-12">
                    <a class="btn btn-outline-secondary btn-lg btn-block mb-4"
                       href="{{route('sport.my.program.week', $day->userProgramWeek->id)}}">
                        <h4>{{$day->userProgramWeek->name}}</h4>
                    </a>
                    @if($day->description)
                        <div class="card card-body  text-center mb-4"><h4>{{$day->description}}</h4></div>
                    @endif
                    <div class="row ">
                        <div class="col-md-4 col-12">
                            <div class="card card-body  text-center mb-4"><h4>{{$day->name}}</h4></div>
                        </div>
                        <div class="col-md-8 col-12">
                            @if ($day->userTrainings)
                                @php($move = 0)
                                @php($last = 0)
                                @foreach($day->userTrainings as $exercise)
                                    @if($exercise)
                                        @php($move++)
                                        <div class="row mb-2">
                                            <div class="col-1">
                                            </div>
                                            <div class="col-1 align-self-center">
                                                <div class="mydiv1" style="display:none;">
                                                    <div>
                                                        <a href="{{route('sport.my.exercise.edit', $exercise->id)}}">
                                                            <img class="media-object"
                                                                 src="{{ Storage::url('image/icons8-inscription-50.png')}}"
                                                                 width="30"
                                                                 height="30"
                                                                 alt="{{ __('gym.edit')}}"
                                                                 title="{{ __('gym.edit')}}"/>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        @if($move==1)
                                                            @php($last = $exercise->id)
                                                            <img src="{{ Storage::url('image/empty.png')}}" width="30"
                                                                 height="30"
                                                                 alt="{{ __('gym.delete')}}"/>
                                                        @else
                                                            <a href="{{route('sport.my.exercise.move', [$exercise->id, $last])}}">
                                                                <img class="media-object "
                                                                     src="{{ Storage::url('image/icons8-move-grabber-50.png')}}"
                                                                     width="30" height="30"
                                                                     alt="{{ __('gym.delete')}}"/>
                                                            </a>
                                                            @php($last = $exercise->id)
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <a href="{{route('sport.my.exercise.delete', $exercise->id)}}"
                                                           onclick="return confirm('Удалить?');">
                                                            <img class=" media-object "
                                                                 src="{{ Storage::url('image/icons8-trash-50.png')}}"
                                                                 width="30"
                                                                 height="30" alt="{{ __('gym.delete')}}"/>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-10">
                                                @include('sport.card.exercise_v2', compact('exercise'))
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <div class="mydiv1" id="mydiv" style="display:none;">
                            <a href="{{route('sport.my.exercise.create', $day->id)}}">
                                <img src="{{ Storage::url('image/icons8-duplicate-50.png')}}" width="50" height="50"
                                     alt="{{ __('gym.edit')}}"
                                     title="{{ __('gym.add')}}"/>
                            </a>
                        </div>
                        <br>
                        <br>
                    </div>
                </div>
            </div>            <br><br><br><br><br>
        </div>
    </div>
@endsection
