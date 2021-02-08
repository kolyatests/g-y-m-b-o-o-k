@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
{{--        @include('admin.content-header')--}}
        <section class="content">
            <div class="box">
                {{ Form::open(['route' => 'admin.bot.viber.hook']) }}
                <div class="box-header with-border">
                    <h3 class="box-title">Setup webhook for viber</h3>
                    @include('layouts.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        Route::post('/bot_viber', 'BotsController@botViber')->name('viber_webhook');<br>
                        You https url   (https://)
                    </div>
                    </div>
                <div class="box-footer">
                    <button class="btn btn-success pull-right">Save</button>
                </div>
                {{ Form::close() }}
            </div>
        </section>
    </div>
@endsection
