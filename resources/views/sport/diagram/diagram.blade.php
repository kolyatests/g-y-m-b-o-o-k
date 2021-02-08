{{--!графики по весам     --}}
@extends('layouts.master-calendar')
@section('content')
    <div class="row content-main ">
        <div class="col-md-6">
            @include('layouts.errors')
            <div class="card-body  text-center">
                <div class="row ">
                    <div class="col-1"></div>
                    <a class="btn btn-outline-secondary col-2" href="{{route('sport.diagram.period', 1)}}">
                        1 мес
                    </a>
                    <a class="btn btn-outline-secondary  col-2" href="{{route('sport.diagram.period', 3)}}">
                        3 мес
                    </a>
                    <a class="btn btn-outline-secondary  col-2" href="{{route('sport.diagram.period', 6)}}">
                        6 мес
                    </a>
                    <a class="btn btn-outline-secondary  col-2" href="{{route('sport.diagram.period', 12)}}">
                        12 мес
                    </a>
                    <a class="btn btn-outline-secondary  col-2" href="{{route('sport.diagram.period', 0)}}">
                        1 год
                    </a>
                </div>
                <div class="row ">
                    <div class="col-1"></div>
                    @if ($array['km'] == 20)
                        <a class="btn btn-outline-secondary  col-5" href="{{route('sport.diagram.kg.km', 10)}}">
                            {{$array['repmin']}}
                        </a>
                        <a class="btn btn-outline-secondary  col-5" href="{{route('sport.diagram.kg.km', 20)}}">
                            {{$array['kgkm']}}
                        </a>
                    @else
                        <a class="btn btn-outline-secondary  col-5" href="{{route('sport.diagram.kg.km', 10)}}">
                            {{$array['repmin']}}
                        </a>
                        <a class="btn btn-outline-secondary  col-5" href="{{route('sport.diagram.kg.km', 20)}}">
                            {{$array['kgkm']}}
                        </a>
                    @endif
                </div>
            </div>
            <div class="ct-chart ct-golden-section" id="chart1"></div>
            <script src="{{asset('js/moment.min.js')}}"></script>
            <script>
                var chart = new Chartist.Line('.ct-chart', {
                    series: [
                        {
                            name: 'series-1',
                            data: [
                                {{$array['data']}}
                            ]
                        },
                    ]
                }, {
                    axisX: {
                        type: Chartist.FixedScaleAxis,
                        divisor: 5,
                        labelInterpolationFnc: function (value) {
                            return moment(value).format('DD-MM-YY');
                        }
                    },
                });
            </script>
            <br>
            <br>
            <br>
        </div>
        <div class="col-md-6">
            <form action="{{route('sport.diagram.add')}}" method="POST">
                {{csrf_field()}}
                <div class="card-body col-12">
                    @foreach($array['exercises'] as $exercise)
                        <div class="row">
                            <div class="col-10">
                                <a class="btn btn-outline-secondary btn-lg btn-block card card-body mb-2 "
                                   href="{{route('sport.diagram.show',$exercise->exercise_id)}}"
                                   @if($array['ex']==$exercise->exercise_id) style="background-color: #F7BCBE;" @endif>
                                    <div class="row">
                                        <div class="col-9">
                                            <h5>{{$exercise->exercise->name}}</h5>
                                        </div>
                                        <div class="col-3 align-self-center">
                                            <img height="72" width="72" class="bg-light shadow-lg float-right   p-1"
                                                 alt=""
                                                 src="{{ Storage::url('image/menu/menu_' . $exercise->exercise_id . '.png')}}"/>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-1 align-self-center">
                                <a href="{{route('sport.diagram.delete', $exercise->exercise_id)}}">
                                    <img class="media-object " src="{{Storage::url('image/icons8-trash-50.png')}}"
                                         width="30" height="30" alt="{{ __('gym.delete')}}"
                                         title="delete"/>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="col-10">
                            <div class="form-group">
                                <select multiple class="form-control select2" id="exampleFormControlSelect2"
                                        name="list[]">
                                    @foreach($array['exercises_distinct'] as $exercise)
                                        @if($exercise->active==0)
                                            <option value="{{$exercise->exercise_id}}">
                                                {{$exercise->exercise->name}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-1 align-self-center">
                            <a href="{{route('sport.diagram.updates')}}">
                                <img class="media-object " src="{{Storage::url('image/updates.png')}}" width="30"
                                     height="30" alt="" title="updates"/>
                            </a>
                        </div>
                    </div>
                    <button type="submit" name="submit"
                            class="btn btn-outline-secondary btn-lg btn-block">{{ __('gym.title_add')}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
