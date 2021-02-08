{{--Добавить ученика по коду     --}}
@extends('sport.trainer.layout')
@section('content')
    <div class="content-wrapper">
        @include('admin.content-header')
        <section class="content">
            {{Form::open(['route' => 'trainer.student.store', 'method' => 'post'])}}
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('gym.title_add')}}</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Код</label>
                            <input type="text" name="trainer_code" class="form-control" id="exampleInputEmail1"
                                   placeholder="" value="{{old('trainer_code')}}">
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button class="btn btn-success pull-right">{{ __('gym.choose_add_title')}}</button>
                </div>
            </div>
            {{Form::close()}}
        </section>
    </div>
@endsection
