{{--Список тренерских программ     --}}
@extends('sport.trainer.layout')
@section('content')
    <div class="content-wrapper">
    @include('admin.content-header')
        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список тренерских программ</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Имя</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($programs as $program)
                            <tr>
                                <td>{{$program->id}}</td>
                                <td>{{$program->name}}</td>
                                <td>
                                    <a href="{{route('trainer.user.program.append', [$id, $program->program_week_id])}}" class="fa fa-plus"></a>

                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </section>
    </div>
    @stack('scripts')
@endsection
