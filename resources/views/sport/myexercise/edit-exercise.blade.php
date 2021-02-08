{{--!редактирование описания упражнения     --}}
@extends('layouts.master')
@section('content')
    <div class="row content-main">
        <div class="col-lg-12">
            @include('layouts.errors')
            <form action="{{route('sport.my.exercise.update', $exercise->id)}}" method="post">
                {{csrf_field()}}
                <img src="{{ Storage::url('image/empty.png')}}" width="50" height="50" alt="">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>{{$exercise->userProgramWeek->name}}</h4>
                    </div>
                    <div class="card-body ">
                        <h4 class="card-title text-center mb-4">{{$exercise->userProgram->name}}</h4>
                        <div class="card card-body mb-4 col-md-8 offset-md-2">
                            <div class="row">
                                <div class="col-9">
                                    <h3>{{$exercise->exerciseName->name}}</h3>
                                    <h4>{{$exercise->description}}</h4>
                                </div>
                                <div class="col-3 align-self-center">
                                    <img height="72" width="72" class="bg-light shadow-lg float-right   p-1" alt=""
                                         src="{{ Storage::url('image/menu/menu_' . $exercise->exercise_id . '.png')}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row col-md-8 offset-md-2">
                            <label for="inputPassword" class="col-4 col-form-label">{{__('gym.comment')}}:</label>
                            <div class="col-8">
                                <input class="form-control" name="comment" id="comment" type="text" maxlength="40"
                                       value="{{old('comment', $exercise->description)}}"
                                       placeholder="{{ __('gym.title_description')}}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-secondary btn-lg btn-block">{{ __('gym.save')}}</button>
                    </div>
                </div>
            </form>
        </div>
        <br>
        <br>
    </div>
@endsection
