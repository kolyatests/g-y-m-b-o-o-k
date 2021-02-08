{{--Список программ у юзера     --}}
@extends('sport.trainer.layout')
@section('content')
    <div class="content-wrapper">
        @include('admin.content-header')
        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список программ у юзера</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Имя</th>
                            <th>Действие</th>
                            <th>от тренера</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($programs as $program)
                            <tr>
                                <td>{{$program->id}}</td>
                                <td>{{$program->name}}</td>
                                <td>
                                    {{ Form::open(['route' => ['trainer.user.program.destroy', [$program->program_week_id, $id]], 'method' => 'delete']) }}
                                    <button onclick="return confirm('are you sure?')" type="submit" class="delete">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                    {{ Form::close() }}
                                </td>
                                <td>@if($program->trainer_id){{$program->trainer_id}}@endif</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </section>
    </div>
    @stack('scripts')
@endsection
