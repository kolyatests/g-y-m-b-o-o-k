<ul>
    <li class="icon icon-arrow-left">
        <a href="#">Мои программы</a>
        <div class="mp-level"><a class="mp-back" href="#">{{ __('gym.back1')}}</a>
            <ul>
                <li class="icon icon-arrow-left">
                    <a href="{{route('sport.my.program.index')}}">{{ __('gym.my_workout_share_head')}}</a>
                </li>
                <li class="icon icon-arrow-left">
                    <a href="{{route('shop.user.pre.paid-programs')}}">Корзина программ</a>
                </li>
                <li class="icon icon-arrow-left">
                    <a href="{{route('shop.user.paid-programs')}}">Купленные</a>
                </li>

            </ul>
        </div>
    </li>

    <li class="icon icon-arrow-left">
        <a href="#">{{$page['workoutPlanCategories']['1']}}</a>
        <div class="mp-level"><a class="mp-back" href="#">{{ __('gym.back1')}}</a>
            <ul>
                <li class="icon icon-arrow-left">
                    <a href="#">{{__('str.place_In_th_ Sport')}}</a>
                    <div class="mp-level"><a class="mp-back" href="#">{{ __('gym.back1')}}</a>
                        <ul>
                            <li class="icon icon-arrow-left">
                                <a href="#">{{__('str.purpose_Lose_Some_Weight')}}</a>
                                <div class="mp-level"><a class="mp-back"
                                                         href="#">{{ __('gym.back1')}}</a>
                                    <ul>
                                        <li>
                                            <a href="{{route('sport.program', 'g1-p1-m1-d1')}}">{{__('str.difficulty_Easy_Level')}}</a>
                                        </li>
                                        <li>
                                            <a href="{{route('sport.program', 'g1-p1-m1-d2')}}">{{__('str.difficulty_Middle_Level')}}</a>
                                        </li>
                                        <li>
                                            <a href="{{route('sport.program', 'g1-p1-m1-d3')}}">{{__('str.difficulty_High_Level')}}</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="icon icon-arrow-left">
                                <a href="#">{{__('str.purpose_Gain_More_Muscle_Mass')}}</a>
                                <div class="mp-level"><a class="mp-back"
                                                         href="#">{{ __('gym.back1')}}</a>
                                    <ul>
                                        <li>
                                            <a href="{{route('sport.program', 'g1-p1-m3-d1')}}">{{__('str.difficulty_Easy_Level')}}</a>
                                        </li>


                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="{{route('sport.program', 'g1-p1-m2')}}">{{__('str.purpose_Fitness_Body')}}</a>
                            </li>
                            <li class="icon icon-arrow-left">
                                <a href="#">{{__('str.purpose_Muscle_Definition')}}</a>
                                <div class="mp-level"><a class="mp-back"
                                                         href="#">{{ __('gym.back1')}}</a>
                                    <ul>


                                        <li>
                                            <a href="{{route('sport.program', 'g1-p1-m6-s6')}}">{{__('str.specific_Circuit_Workouts')}}</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="{{route('sport.program', 'g1-p1-m7')}}">{{__('str.purpose_Strength_Gain')}}</a>
                            </li>
                            <li>
                                <a href="{{route('sport.program', 'g1-p1-m4')}}">{{__('str.purpose_Specific_Muscles_Definition')}}</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="icon icon-arrow-left">
                    <a href="#">{{__('str.place_Home_Workouts')}}</a>
                    <div class="mp-level"><a class="mp-back" href="#">{{ __('gym.back1')}}</a>
                        <ul>
                            <li class="icon icon-arrow-left">
                                <a href="#">{{__('str.purpose_Lose_Some_Weight')}}</a>
                                <div class="mp-level"><a class="mp-back"
                                                         href="#">{{ __('gym.back1')}}</a>
                                    <ul>
                                        <li class="icon icon-arrow-left">
                                            <a href="#">{{__('str.specific_Dumbbells')}}</a>
                                            <div class="mp-level"><a class="mp-back"
                                                                     href="#">{{ __('gym.back1')}}</a>
                                                <ul>
                                                    <li>
                                                        <a href="{{route('sport.program', 'g1-p2-m1-s9-d1')}}">{{__('str.difficulty_Easy_Level')}}</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('sport.program', 'g1-p2-m1-s9-d2')}}">{{__('str.difficulty_Middle_Level')}}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="icon icon-arrow-left">
                                            <a href="#">{{__('str.specific_Skipping_Rope')}}</a>
                                            <div class="mp-level"><a class="mp-back"
                                                                     href="#">{{ __('gym.back1')}}</a>
                                                <ul>
                                                    <li>
                                                        <a href="{{route('sport.program', 'g1-p2-m1-s13-d1')}}">{{__('str.difficulty_Easy_Level')}}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="icon icon-arrow-left">
                                            <a href="#">{{__('str.specific_Without_Equipment')}}</a>
                                            <div class="mp-level"><a class="mp-back"
                                                                     href="#">{{ __('gym.back1')}}</a>
                                                <ul>
                                                    <li>
                                                        <a href="{{route('sport.program', 'g1-p2-m1-s14-d1')}}">{{__('str.difficulty_Easy_Level')}}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="icon icon-arrow-left">
                                <a href="#">{{__('str.purpose_Gain_More_Muscle_Mass')}}</a>
                                <div class="mp-level"><a class="mp-back"
                                                         href="#">{{ __('gym.back1')}}</a>
                                    <ul>
                                        <li class="icon icon-arrow-left">
                                            <a href="#">{{__('str.specific_Gain_More_Muscle_Mass')}}</a>
                                            <div class="mp-level"><a class="mp-back"
                                                                     href="#">{{ __('gym.back1')}}</a>
                                                <ul>
                                                    <li>
                                                        <a href="{{route('sport.program', 'g1-p2-m3-s9-d1')}}">{{__('str.difficulty_Easy_Level')}}</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('sport.program', 'g1-p2-m3-s9-d3')}}">{{__('str.difficulty_High_Level')}}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="icon icon-arrow-left">
                                            <a href="#">{{__('str.specific_Horizontal_Bar')}}</a>
                                            <div class="mp-level"><a class="mp-back"
                                                                     href="#">{{ __('gym.back1')}}</a>
                                                <ul>
                                                    <li>
                                                        <a href="{{route('sport.program', 'g1-p2-m3-s11-d1')}}">{{__('str.difficulty_Easy_Level')}}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="icon icon-arrow-left">
                                            <a href="#">{{__('str.specific_Horizontal_Bar_and_Parallel_Bars')}}</a>
                                            <div class="mp-level"><a class="mp-back"
                                                                     href="#">{{ __('gym.back1')}}</a>
                                                <ul>
                                                    <li>
                                                        <a href="{{route('sport.program', 'g1-p2-m3-s12-d1')}}">{{__('str.difficulty_Easy_Level')}}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="{{route('sport.program', 'p2-m9')}}">{{__('str.purpose_Quick')}}</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </li>
    <li class="icon icon-arrow-left">
        <a href="#">{{$page['workoutPlanCategories']['2']}}</a>
        <div class="mp-level"><a class="mp-back" href="#">{{ __('gym.back1')}}</a>
            <ul>
                <li class="icon icon-arrow-left">
                    <a href="#">{{__('str.place_In_th_ Sport')}}</a>
                    <div class="mp-level"><a class="mp-back" href="#">{{ __('gym.back1')}}</a>
                        <ul>
                            <li>
                                <a href="{{route('sport.program', 'g2-p1-m1')}}">{{__('str.purpose_Lose_Some_Weight')}}</a>
                            </li>
                            <li>
                                <a href="{{route('sport.program', 'g2-p1-m3')}}">{{__('str.purpose_Gain_More_Muscle_Mass')}}</a>
                            </li>
                            <li>
                                <a href="{{route('sport.program', 'g2-p1-m2')}}">{{__('str.purpose_Fitness_Body')}}</a>
                            </li>
                            <li>
                                <a href="{{route('sport.program', 'g2-p1-m6')}}">{{__('str.purpose_Muscle_Definition')}}</a>
                            </li>
                            <li>
                                <a href="{{route('sport.program', 'g2-p1-m4')}}">{{__('str.purpose_Specific_Muscles_Definition')}}</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="icon icon-arrow-left">
                    <a href="#">{{__('str.place_Home_Workouts')}}</a>
                    <div class="mp-level"><a class="mp-back" href="#">{{ __('gym.back1')}}</a>
                        <ul>
                            <li class="icon icon-arrow-left">
                                <a href="#">{{__('str.purpose_Lose_Some_Weight')}}</a>
                                <div class="mp-level"><a class="mp-back"
                                                         href="#">{{ __('gym.back1')}}</a>
                                    <ul>
                                        <li>
                                            <a href="{{route('sport.program', 'g2-p2-m1-s9')}}">{{__('str.specific_Dumbbells')}}</a>
                                        </li>
                                        <li class="icon icon-arrow-left">
                                            <a href="#">{{__('str.specific_Skipping_Rope')}}</a>
                                            <div class="mp-level"><a class="mp-back"
                                                                     href="#">{{ __('gym.back1')}}</a>
                                                <ul>
                                                    <li>
                                                        <a href="{{route('sport.program', 'g2-p2-m1-s13-d1')}}">{{__('str.difficulty_Easy_Level')}}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="icon icon-arrow-left">
                                            <a href="#">{{__('str.specific_Without_Equipment')}}</a>
                                            <div class="mp-level"><a class="mp-back"
                                                                     href="#">{{ __('gym.back1')}}</a>
                                                <ul>
                                                    <li>
                                                        <a href="{{route('sport.program', 'g2-p2-m1-s14-d1')}}">{{__('str.difficulty_Easy_Level')}}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="{{route('sport.program', 'g2-p2-m3')}}">{{__('str.purpose_Gain_More_Muscle_Mass')}}</a>
                            </li>

                            <li>
                                <a href="{{route('sport.program', 'g2-p2-m4')}}">{{__('str.purpose_Specific_Muscles_Definition')}}</a>
                            </li>
                            <li>
                                <a href="{{route('sport.program', 'p2-m9')}}">{{__('str.purpose_Quick')}}</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </li>
    <li class="icon icon-arrow-left">
        <a href="{{route('sport.all.trains')}}">По параметрам</a>
    </li>
    <li class="icon icon-arrow-left">
        <a href="{{route('sport.all.trains.photo')}}">C фото</a>
    </li>
    <li class="icon icon-arrow-left">
        <a href="#">Бесплатные</a>
        <div class="mp-level"><a class="mp-back" href="#">{{ __('gym.back1')}}</a>
            <ul>
                <li class="icon icon-arrow-left">
                    <a href="#">{{$page['workoutPlanCategories']['1']}}</a>
                    <div class="mp-level"><a class="mp-back" href="#">{{ __('gym.back1')}}</a>
                        <ul>
                            <li>
                                <a href="{{route('sport.program.week', 1)}}">{{$page['workoutPlanCategories']['1001']}}</a>
                            </li>
                            <li>
                                <a href="{{route('sport.program.week', 3)}}">{{$page['workoutPlanCategories']['1003']}}</a>
                            </li>
                            <li>
                                <a href="{{route('sport.program.week', 5)}}">{{$page['workoutPlanCategories']['1005']}}</a>
                            </li>
                            <li>
                                <a href="{{route('sport.program.week', 9)}}">{{$page['workoutPlanCategories']['1009']}}</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="icon icon-arrow-left">
                    <a href="#">{{$page['workoutPlanCategories']['2']}}</a>
                    <div class="mp-level"><a class="mp-back" href="#">{{ __('gym.back1')}}</a>
                        <ul>
                            <li>
                                <a href="{{route('sport.program.week', 2)}}">{{$page['workoutPlanCategories']['1002']}}</a>
                            </li>
                            <li>
                                <a href="{{route('sport.program.week', 4)}}">{{$page['workoutPlanCategories']['1004']}}</a>
                            </li>
                            <li>
                                <a href="{{route('sport.program.week', 6)}}">{{$page['workoutPlanCategories']['1006']}}</a>
                            </li>
                            <li>
                                <a href="{{route('sport.program.week', 10)}}">{{$page['workoutPlanCategories']['1010']}}</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </li>
</ul>
