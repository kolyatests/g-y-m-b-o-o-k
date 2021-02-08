@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        @include('admin.content-header')
        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Мышци</h3>
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
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->menu_id}}</td>
                                <td>
                                    <a href="{{route('admin.categories.exercises.index', $category->menu_id)}}">{{$category->text}}</a>
                                <td>
                                    <img src="{{ Storage::url('image/menu_categ/' . $category->image->img . '.png')}}"
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
