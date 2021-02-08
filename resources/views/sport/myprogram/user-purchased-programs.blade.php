{{--!купленные программы     --}}
@extends('layouts.master')
@section('content')
    <div class="row content-main">
        <div class="col-lg-12">
            @include('layouts.errors')
            <div class="card">
                <div class="card-header text-center">
                    <h4>Купленные</h4>
                </div>
                <div class="card-body">
                    @if($programs)
                        @foreach($programs as $program)
                            @if($program->workoutText)
                                <a class="btn btn-outline-secondary card-body btn-lg btn-block"
                                   href="{{route('sport.program.description', $program->workout_plan_id)}}">
                                    <h4>{{$program->workoutText->name}}</h4>
                                </a>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
            <br>
            <br>
        </div>
    </div>
@endsection
