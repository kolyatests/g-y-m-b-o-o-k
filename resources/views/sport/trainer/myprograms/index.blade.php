{{--Тренерские программы     --}}
@extends('sport.trainer.layout')
@section('content')
    <div class="content-wrapper">
        @include('admin.content-header')
        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Программы мои</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Программы</th>
                            <th>{{ __('gym.delete')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($programs as $program)
                            <tr>
                                <td>{{$program->name}}</td>
                                <td> {{Form::open(['route' => ['trainer.program.del', $program->program_week_id], 'method' => 'delete'])}}
                                    <button onclick="return confirm('are you sure?')" type="submit" class="delete">
                                        <i class="fa fa-remove"></i>
                                    </button>
                                    {{Form::close()}}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
