{{--!выбрать рограмму для покупки из предложенных     --}}
@extends('layouts.master')
@section('content')
    <div class="row content-main">
        <div class="col-lg-12">
            @foreach($pages as $page)
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-uppercase text-center">{{$page->buyProgramText->name}}</h4>
                    </div>
                    <div class="card-body text-center">
                        <a href="{{route('sport.program.description', $page->workout_plan_id)}}">
                            <img class="img-thumbnail" alt=""
                                 src="{{ Storage::url('image/workout_plan/workout_plan_' . $page->workout_plan_id . '.jpg')}}"/>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
