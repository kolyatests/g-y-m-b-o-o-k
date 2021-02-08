{{--!МОЯ ТРЕНИРОВКА  из мои программы   1--}}
@extends('layouts.master')
@section('content')
    <div class="row content-main ">
        <div class="col-12">
            @include('layouts.errors')
            <form action="{{route('sport.my.train.day.store', $program->id)}}" method="post">
                {{csrf_field()}}
                <a id="toggleLink" href="javascript:void(0);" onclick="viewdiv('mydiv');">
                    <img src="{{ Storage::url('image/icons8-inscription-50.png')}}" width="50" height="50"
                         alt="{{ __('gym.edit')}}"
                         title="{{ __('gym.edit')}}"/> </a>
                <div class="card">
                    <div class="card-header text-center ">
                        <a class="btn btn-outline-secondary btn-lg btn-block"
                           href="{{route('sport.my.program.index')}}">
                            <h3>{{ __('gym.my_workout_share_head')}}</h3>
                        </a>
                    </div>
                    <div class="card-body col-12">
                        <h4 class="card-title text-center">{{$program->name}}</h4>
                        @if($program->description)
                            <h5 class="card-title text-center">{{$program->description}}</h5>
                        @endif
                        @if($program->userPrograms)
                            @foreach($program->userPrograms as $myProgram)
                                <div class="row">
                                    <div class="col-md-4 col-11">
                                        <a class="btn btn-outline-secondary btn-lg btn-block mb-2"
                                           href="{{route('sport.my.program.day', $myProgram->id)}}">
                                            <h4>{{$myProgram->name}}</h4>
                                        </a>
                                    </div>
                                    <div class="col-1 align-self-center">
                                        <div class=" mydiv1 " style="display:none;">
                                            <a href="{{route('sport.my.train.day.delete', $myProgram->id)}}"
                                               onclick="return confirm('Удалить?');">
                                                <img class="media-object float-right"
                                                     src="{{Storage::url('image/icons8-trash-50.png')}}" width="30"
                                                     height="30"
                                                     alt="{{ __('gym.delete')}}"/></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div id="mydiv" style="display:none;">
                                <input class="col-md-4 col-12 form-control   mb-2" type="text" id="nameday"
                                       name="nameday" value="{{old('nameday')}}" maxlength="15"
                                       placeholder="{{ __('gym.title_add')}}"><span></span>
                            </div>
                            <div class=" mydiv1 " style="display:none;">
                                <button class="btn btn-outline-secondary btn-lg btn-block" type="submit" name="submit"
                                >{{ __('gym.save')}}
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
