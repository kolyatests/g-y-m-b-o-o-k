{{--!МОЯ ТРЕНИРОВКА  все мои программы   1--}}
@extends('layouts.master')
@section('content')

    <div class="row content-main ">
        <div class="col-12">
            @include('layouts.errors')
            <a id="toggleLink" href="javascript:void(0);" onclick="viewdiv('mydiv');">
                <img src="{{ Storage::url('image/icons8-inscription-50.png')}}" width="50" height="50"
                     alt="{{ __('gym.edit')}}"
                     title="{{ __('gym.edit')}}"/> </a>
            <div class="card">
                <div class="card-header text-center ">
                    <h4 class="text-uppercase text-center">{{ __('gym.my_workout_share_head')}}</h4>
                </div>
                <div class="card-body col-12">
                    @foreach($userWithProgramWeeks->userProgramWeeks as $programWeek)
                        <div class="row">
                            <div class="col-1">
                            </div>
                            <div class="col-10">
                                <a class="btn btn-outline-secondary btn-lg btn-block mb-2"
                                   @if($programWeek->trainer_id) style="background-color:#F6C9CA" @endif
                                   href="{{route('sport.my.program.week', $programWeek->id)}}">
                                    <h4>{{$programWeek->name}}@if($programWeek->trainer_id)
                                            --от
                                            тренера @endif</h4>
                                </a>
                            </div>
                            <div class="col-1 align-self-center">
                                <div class="mydiv1" style="display:none;">
                                    <a href="{{route('sport.my.program.delete', $programWeek->id)}}"
                                       onclick="return confirm('Удалить?');">
                                        <img class="media-object " src="{{Storage::url('image/icons8-trash-50.png')}}"
                                             width="30" height="30" alt="{{ __('gym.delete')}}"
                                             title="delete"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div id="mydiv" style="display:none;">
                        <form action="{{route('sport.my.program.store')}}" method="post">
                            {{csrf_field()}}
                            <input class="form-control form-control-lg" type="text" name="name" maxlength="100"
                                   placeholder="{{ __('gym.name')}}" value="{{Request::old('name')}}"><br>
                            <input class="form-control form-control-lg" type="text" name="descr" maxlength="300"
                                   placeholder="{{ __('gym.title_description')}}" value="{{Request::old('description')}}"><br>
                            <button type="submit" name="submit"
                                    class="btn btn-outline-secondary btn-lg btn-block">{{ __('gym.save')}}</button>
                            <br>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
