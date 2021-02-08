@extends('admin.layout')

@section('content')


    <div class="content-wrapper">
        @include('admin.content-header')


        <section class="content">


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Упражнения</h3>
                </div>

                <div class="box-body">
                    <div class="form-group">
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{ __('gym.name')}}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($exercises as $exercise)
                            <tr>
                                <td>{{$exercise->exercise_id}}</td>
                                <td>
                                    <a href="{{route('admin.categories.exercises.show', [$id, $exercise->exercise_id])}}">
                                        {{$exercise->name}}
                                    </a>
                                </td>
                                <td>
                                    <img src="{{ Storage::url('image/menu/menu_' . $exercise->exercise_id . '.png')}}"
                                         alt="" class="img-responsive">
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>

            </div>


        </section>

    </div>

@endsection
