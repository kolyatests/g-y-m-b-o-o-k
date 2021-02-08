{{--!купить программу из выбранных     1--}}
@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-header mb-4">
                    <h4 class="text-uppercase text-center">{{$workoutPlan->getPurpose()}}</h4>
                </div>
                <h4 class="card-title text-center">{{$workoutPlan->buyProgramText->name}}</h4>
                <div class="row justify-content-center mx-auto">

                    <div class="col-md-6">
                        <div class="card-body center-block">
                            <img class="img-thumbnail    "
                                 src="{{ Storage::url('image/workout_plan/' . $workoutPlan->img . '.jpg')}}" alt="">
                        </div>
                        <div class="card-group">
                            <div class="card ">
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{__('gym.for')}}</h5>
                                    <p class="card-text text-center">{{$workoutPlan->getGender()}}</p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{__('gym.difficulty')}}</h5>
                                    <p class="card-text text-center">{{$workoutPlan->getDifficulty()}}</p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{__('gym.workout_in_week')}}</h5>
                                    <p class="card-text text-center">{{$workoutPlan->workout_week}}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <p class="card-text text-center">{{$workoutPlan->getEquipments()}}</p>
                        <br>
                        <br>
                    </div>
                    <div class="col-md-6">
                        <p class="card-text text-center">{!! $workoutPlan->getMonth()!!}</p>
{{--                            не куплена--}}
                        @if(! $statusShopped)
                            <a class="btn btn-outline-secondary btn-lg btn-block"
                               href="{{route('shop.user.basket', $workoutPlan->workout_plan_id)}}"><h4>{{ __('gym.buy')}}</h4></a>
{{--                                 заказана--}}
                        @elseif($statusShopped == 1)
                            <a class="btn btn-outline-secondary btn-lg btn-block" href="#"><h4>Ждите выполнения
                                    заказа</h4></a>
{{--                                 куплена--}}
                        @elseif($statusShopped == 2)
                            <a class="btn btn-outline-secondary btn-lg btn-block"
                               href="{{route('sport.program.week', $workoutPlan->workout_plan_id)}}"><h4>Купленная, можете добавить в мои
                                    тренировки</h4></a>
{{--                                 добавленна--}}
                        @else
                            <a class="btn btn-outline-secondary btn-lg btn-block" href="#"><h4>Добавленная в мои
                                    тренировки</h4></a>
                        @endif
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
