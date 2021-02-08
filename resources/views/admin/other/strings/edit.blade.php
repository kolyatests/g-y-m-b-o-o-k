@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        @include('admin.content-header')
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Меняем</h3>
                </div>
                <div class="box-body">
                    {{ Form::open(['route' => ['admin.strings.update', $name], 'method' => 'put']) }}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ __('gym.name')}}</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                   name="name" placeholder="" value="{{$name}}">
                        </div>
                    </div>

                    @foreach($values as $value)
{{--                        {{$value}}--}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{$value->lang}}</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       name="title[{{$value->lang}}]" placeholder="" value="{{old('title.'.$value->lang, $value->text) }}">
                            </div>
                        </div>
                    @endforeach


                    <div class="box-footer">
                        <button class="btn btn-warning pull-right">Изменить</button>
                    </div>

                    {{ Form::close() }}
                </div>

            </div>
        </section>

    </div>


@endsection
