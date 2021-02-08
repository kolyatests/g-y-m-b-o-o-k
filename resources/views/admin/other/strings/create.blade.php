@extends('admin.layout')

@section('content')


    <div class="content-wrapper">
        @include('admin.content-header')

        <section class="content">


            <div class="box">
                {{ Form::open(['route' => 'admin.strings.store']) }}
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('gym.title_add')}}</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ __('gym.name')}}</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="name">
                        </div>
                    </div>

                    @foreach($langs as $lang)
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{$lang->name}}</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder=""
                                       name="title[{{$lang->code}}]" value="{{ old('title.'.$lang->code) }}">
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="box-footer">
                    <button class="btn btn-success pull-right">{{ __('gym.choose_add_title')}}</button>
                </div>

                {{ Form::close() }}
            </div>


        </section>

    </div>


@endsection
