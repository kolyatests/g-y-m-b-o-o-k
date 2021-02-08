@extends('admin.layout')

@section('content')

    <div class="content-wrapper">
        @include('admin.content-header')


        <section class="content">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Листинг </h3>
                </div>

                <div class="box-body">
                    <div class="form-group">
                        <a href="{{route('admin.users.create')}}"
                           class="btn btn-success">{{ __('gym.choose_add_title')}}</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>On-line</th>
                            <th>Имя</th>
                            <th>E-mail</th>
                            <th>Аватар</th>
                            <th>админ</th>
                            <th>тренер</th>
                            <th>модератор</th>
                            <th>менеджер</th>
                            <th>ban</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr @if($user->isBan()) style="background-color:#c0a16b" @endif
                            @if($user->deleted_at) style="color: #b0d4f1" @endif>
                                <td>{{$user->id}}</td>
                                <td>
                                    @if($user->isOnline())
                                        <span style="color:green">В сети</span>
                                    @elseif(! $user->deleted_at && ! $user->isBan())
                                        <span style="color:red">Не в сети</span>
                                    @endif
                                </td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <img src="{{ Storage::url($user->getImage())}}" alt="" height="100">
                                </td>
                                <th @if($user->isAdmin()) style="background-color:#cc006a" @endif></th>
                                <th @if($user->isTrainer()) style="background-color:#c87f0a" @endif></th>
                                <th @if($user->isModerator()) style="background-color:#5cb85c" @endif></th>
                                <th @if($user->isManager()) style="background-color:#97a0b3" @endif></th>
                                <th>{{$user->isBan()}}</th>

                                <td>
                                    @if(!$user->deleted_at)
                                        <a href="{{route('admin.users.edit', $user->id)}}"
                                           class="fa fa-pencil"></a>
                                        {{ Form::open(['route' => ['admin.users.destroy', $user->id], 'method' => 'delete']) }}
                                        <button onclick="return confirm('are you sure?')" type="submit" class="delete">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                        {{ Form::close() }}
                                    @else
                                        {{ Form::open(['route' => ['admin.users.finaldestroy', $user->id], 'method' => 'delete']) }}
                                        <button onclick="return confirm('are you sure?Совсем удалю?')" type="submit"
                                                class="delete">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        {{ Form::close() }}
                                        <a href="{{route('admin.users.restore', $user->id)}}"
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
