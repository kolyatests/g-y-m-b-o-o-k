{{--!!корзина программ юзера--}}
@extends('layouts.master')
@section('content')
    <div class="row content-main">
        <div class="col-lg-12">
            @include('layouts.errors')
            <div class="card">
                <div class="card-header text-center">
                    <h4>Корзина программ</h4>
                </div>
                <div class="card-body">
                    @if($programs)
                        @foreach($programs as $program)
                            <div class="card card-body  text-center mb-2"><h4>{{$program->workoutText->name}}</h4>
                            </div>
                        @endforeach
                        <a class="btn btn-outline-secondary btn-lg btn-block" href="{{route('shop.user.buy')}}"><h4>
                                Оформить заказ</h4></a>
                    @endif
                </div>
            </div>
            <br>
            <br>
        </div>
    </div>
@endsection
