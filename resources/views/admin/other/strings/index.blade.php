@extends('admin.layout')

@section('content')

    <div class="content-wrapper">
        @include('admin.content-header')

        <section class="content">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Листинг сущности</h3>
                </div>

                <div class="box-body">
                    <div class="form-group">
                        <a href="{{route('admin.strings.create')}}"
                           class="btn btn-success">{{ __('gym.choose_add_title')}}</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>name</th>
                            <th>Сущности</th>
                            <th>Действия</th>
                            <th>Дата удаления/Востановить</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($values as $value)
                            <tr @if($value->deleted_at) style="color: #b0d4f1" @endif>
                                <td>{{$value->name}}</td>
                                <td>{{$value->text}}</td>
                                <td>
                                    <a href="{{route('admin.strings.edit', $value->name)}}" class="fa fa-pencil"></a>
                                    {{ Form::open(['route' => ['admin.strings.destroy', $value->name], 'method' => 'delete']) }}
                                    <button onclick="return confirm('are you sure?')" type="submit" class="delete">
                                        <i class="fa fa-remove"></i>
                                    </button>
                                    {{ Form::close() }}
                                </td>
                                <td>
                                    @if($value->deleted_at)
                                        <a href="{{route('admin.strings.restore', $value->name)}}">{{\Carbon\Carbon::parse($value->deleted_at)->format('d.M H:i')}}</a>
                                    @else

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
