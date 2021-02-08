{{--Программы тренера     --}}
@extends('sport.trainer.layout')
@section('content')
    <div class="content-wrapper">
        @include('admin.content-header')
        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Программы готовые</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Программы</th>
                            <th>{{ __('gym.title_add')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($programs as $program)
                            <tr>
                                <td>{{$program->name}}</td>
                                <td>
                                    <a href="{{route('trainer.program.add', $program->program_week_id)}}"
                                       class="fa fa-plus"></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
