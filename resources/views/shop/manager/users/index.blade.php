{{--Все юзеры у менеджера--}}
@extends('shop.manager.layout')
@section('content')
    <div class="content-wrapper">
        @include('admin.content-header')
        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Все юзеры</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Имя</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            @isset($user->user->name)
                                <tr>
                                    <td>{{$user->user_id}}</td>
                                    <td>
                                        <a href="{{route('shop.manager.user.programs', $user->user_id)}}">{{$user->user->name}}</a>
                                    </td>
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
