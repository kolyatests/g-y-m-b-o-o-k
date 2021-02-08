@extends('admin.layout')
@section('content')

    <div class="content-wrapper">

        <section class="content">

            <div class="row content-main">
                <div class="col-lg-12">
                    <div class="card ">
                        <div class="card-header mb-4">
                            <h4 class="text-uppercase text-center">{{$text['description']}}</h4>
                        </div>
                        <div class="row justify-content-center mx-auto">
                            <div class="col-md-6">
                                <div class="card-body center-block">
                                    <img class="img-thumbnail" src="{{ Storage::url($text['image'])}}" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    {!! $text['eqipa'] !!}
                                </div>
                                <p class="card-text">{{$text['description_text']}}</p>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>

    </div>

@endsection
