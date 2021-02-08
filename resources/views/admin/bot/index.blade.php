@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        @include('admin.content-header')
        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Боты> </h3>
                </div>
                <div class="box-body">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Бот</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2</td>
                                <td><a href="{{route('admin.bot.viber')}}">viber</a></td>
                            </tr>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
