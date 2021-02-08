{{--Календарь юзера     --}}
@extends('sport.trainer.layout')
@section('content')
    <div class="content-wrapper">
        @include('admin.content-header')
        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><a href="{{route('trainer.user.calendar', $id)}}">Календарь юзера {{$id}}</a>
                    </h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>выполнено</th>
                            <th>дата</th>
                            <th>от тренера</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($days as $day)
                            <tr>
                                <td>{{$day->id}}</td>
                                <td>@if($day->active){{$day->active}}@endif</td>
                                <td>{{$day->date}}</td>
                                <td>@if($day->trainer_id){{$day->trainer_id}}@endif</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </section>
    </div>
    @stack('scripts')
@endsection
