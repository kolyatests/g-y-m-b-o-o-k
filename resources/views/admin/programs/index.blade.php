@extends('admin.layout')

@section('content')

    <div class="content-wrapper">
        @include('admin.content-header')


        <section class="content">


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Стандартные программы</h3>
                </div>

                <div class="box-body">
                    <div class="form-group">
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>program_week_id</th>
                            <th>Программы</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($programs as $program)
                            <tr @if($program->deleted_at) style="color: #b0d4f1" @endif>
                                <td>{{$program->program_week_id}}</td>
                                <td>{{$program->name}}</td>
                                <td>
                                    @if(!$program->deleted_at)
                                        {{ Form::open(['route' => ['admin.programs.destroy', $program->program_week_id], 'method' => 'delete']) }}
                                        <button onclick="return confirm('are you sure?')" type="submit" class="delete">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                        {{ Form::close() }}
                                    @else
                                        {{ Form::open(['route' => ['admin.programs.finaldestroy', $program->program_week_id], 'method' => 'delete']) }}
                                        <button onclick="return confirm('are you sure?Совсем удалю?')" type="submit"
                                                class="delete">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        {{ Form::close() }}
                                        <a href="{{route('admin.programs.restore', $program->program_week_id)}}"
                                           class="fa fa-refresh"></a>
                                    @endif


                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

            </div>


        </section>

    </div>

@endsection
