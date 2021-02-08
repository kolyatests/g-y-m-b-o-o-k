{{--Ученики тренере     --}}
@extends('sport.trainer.layout')
@section('content')
    <div class="content-wrapper">
        @include('admin.content-header')
        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Мои ученики</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{route('trainer.student.add')}}" class="btn btn-success">Добавить по коду</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Имя</th>
                            <th>E-mail</th>
                            <th>Аватар</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td><a href="{{route('trainer.user.show', $user->id)}}">{{$user->name}}</a></td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <img src="{{ Storage::url($user->getImage())}}" alt="" class="img-responsive"
                                         width="150">
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
