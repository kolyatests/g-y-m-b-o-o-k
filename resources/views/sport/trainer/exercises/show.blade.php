{{--описание упражнения у тренера     --}}
@extends('sport.trainer.layout')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="program">
                <div class="program-flex50">
                    <div class="program50">
                        <div class="exercise-main-pic-name">
                            <p>{{$page['description']}}</p>
                        </div>
                        <div class="exercise-main-pic-img">
                            <img src="{{ Storage::url($page['image'])}}" width="200">
                        </div>
                    </div>
                    <div class="program50">
                        <div class="exercise-main-text-param">
                            {!! $page['eqipa'] !!}
                        </div>
                        <div class="exercise-main-text-desc">
                            <p>
                                {{$page['description_text']}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
