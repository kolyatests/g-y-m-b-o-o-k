{{--Программы предзаказаные--}}
@extends('shop.manager.layout')
@section('content')
    <div class="content-wrapper">
        @include('admin.content-header')
        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Программы предзаказаные</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Пользователь</th>
                            <th>Программа</th>
                            <th>Не оплачено</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($programs as $program)
                            @isset($program->user->name, $program->workoutText->name)
                                <tr>
                                    <td>{{$program->id}}</td>
                                    <td>{{$program->user->name}}</td>
                                    <td>{{$program->workoutText->name}}</td>
                                    <td>
                                        <a href="{{route('shop.manager.program.pay', $program->id)}}"
                                           class="fa fa-square-o"></a>
                                        {{Form::open(['route' => ['shop.manager.program.destroy', $program->id], 'method' => 'delete'])}}
                                        <button onclick="return confirm('are you sure?')" type="submit" class="delete">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        {{Form::close()}}</td>
                                </tr>
                            @endisset
                        @endforeach
                    </table>
                </div>
            </div>
        </section>
    </div>
    @stack('scripts')
@endsection
