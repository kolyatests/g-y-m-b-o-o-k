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
                        <a href="{{route('admin.desc_equipment.create')}}"
                           class="btn btn-success">{{ __('gym.choose_add_title')}}</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>code</th>
                            <th>Сущности</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($values as $value)
                            <tr @if($value->deleted_at) style="color: #b0d4f1" @endif>
                                <td>{{$value->code}}</td>
                                <td>{{$value->name}}</td>
                                <td>
                                    @if(!$value->deleted_at)
                                        <a href="{{route('admin.desc_equipment.edit', $value->code)}}"
                                           class="fa fa-pencil"></a>
                                        {{ Form::open(['route' => ['admin.desc_equipment.destroy', $value->code], 'method' => 'delete']) }}
                                        <button onclick="return confirm('are you sure?')" type="submit" class="delete">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                        {{ Form::close() }}
                                    @else
                                        {{ Form::open(['route' => ['admin.desc_equipment.finaldestroy', $value->code], 'method' => 'delete']) }}
                                        <button onclick="return confirm('are you sure?Совсем удалю?')" type="submit"
                                                class="delete">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        {{ Form::close() }}
                                        <a href="{{route('admin.desc_equipment.restore',$value->code)}}"
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
