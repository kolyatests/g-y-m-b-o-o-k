<nav id="mp-menu" class="mp-menu">
    <div class="mp-level">
        <h2 class="icon icon-world">{{ __('gym.menu1')}}</h2>
        <ul>
            <li>
                <a href="{{route('book.main')}}">Book</a>
                {{--                <a href="{{route('book.main')}}">Блог</a>--}}
            </li>
            <li class="icon icon-arrow-left">
                <a href="#">{{ __('gym.menu_workouts')}}</a>
                <div class="mp-level"><a class="mp-back"
                                         href="#">{{ __('gym.back1')}}</a>
                    @include('menu.menu-all-workouts')
                </div>
            </li>
            <li>
                <a href="{{route('sport.exercises.show')}}">{{ __('gym.menu_exercise')}}</a>
            </li>
            <li>
                <a href="{{route('sport.calendar')}}">{{ __('gym.menu_calendar')}}</a>
            </li>
            <li class="icon icon-arrow-left">
                <a href="#">{{ __('gym.menu_graphs')}}</a>
                <div class="mp-level"><a class="mp-back" href="#">{{ __('gym.back1')}}</a>
                    <ul>
                        <li><a href="{{route('sport.diagram')}}">{{ __('gym.menu_graphs')}}</a></li>
                    </ul>
                </div>
            </li>

            <li class="icon icon-arrow-left">
                <a href="#">{{ __('gym.menu_settings')}}</a>
                <div class="mp-level"><a class="mp-back" href="#">{{ __('gym.back1')}}</a>
                    <ul>
                        <li><a href="{{route('profile.edit')}}">Профиль</a></li>
                        <li class="icon icon-arrow-left">
                            <a href="#">{{ __('gym.title_lang')}}</a>
                            <div class="mp-level"><a class="mp-back" href="#">{{ __('gym.back1')}}</a>
                                <ul>
                                    <li><a href="{{route('sport.tuning.lang', 'English')}}">English</a></li>
                                    <li><a href="{{route('sport.tuning.lang', 'Русский')}}">Русский</a></li>
                                    <li><a href="{{route('sport.tuning.lang', 'Deutsch')}}">Deutsch</a></li>
                                    <li><a href="{{route('sport.tuning.lang', 'Espanol')}}">Espanol</a></li>
                                    <li><a href="{{route('sport.tuning.lang', 'Portugues')}}">Portugues</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="icon icon-arrow-left">
                            <a href="#">{{ __('gym.title_weight')}}</a>
                            <div class="mp-level"><a class="mp-back" href="#">{{ __('gym.back1')}}</a>
                                <ul>
                                    <li><a href="{{route('sport.tuning.mass', 1)}}">{{__('str.Kg')}}</a></li>
                                    <li><a href="{{route('sport.tuning.mass', 2)}}">{{__('str.Lb')}}</a></li>
                                    <li><a href="{{route('sport.tuning.mass', 3)}}">{{__('str.Catty')}}</a></li>
                                    <li><a href="{{route('sport.tuning.mass', 4)}}">{{__('str.Oz')}}</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="icon icon-arrow-left">
                            <a href="#">{{ __('gym.title_km')}}</a>
                            <div class="mp-level"><a class="mp-back" href="#">{{ __('gym.back1')}}</a>
                                <ul>
                                    <li><a href="{{route('sport.tuning.weight', 1)}}">{{__('str.Km')}}</a></li>
                                    <li><a href="{{route('sport.tuning.weight', 2)}}">{{__('str.Miles')}}</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="icon icon-arrow-left">
                            <a href="#">{{ __('gym.title_startweek')}}
                            </a>
                            <div class="mp-level"><a class="mp-back" href="#">{{ __('gym.back1')}}</a>
                                <ul>
                                    <li><a href="{{route('sport.tuning.day', 1)}}">{{ __('gym.week_full_mon')}}</a></li>
                                    <li><a href="{{route('sport.tuning.day', 0)}}">{{ __('gym.week_full_sun')}}</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="icon icon-arrow-left">
                            <a href="#">Код для тренера
                            </a>
                            <div class="mp-level"><a class="mp-back" href="#">{{ __('gym.back1')}}</a>
                                <ul>

                                    @if(!auth()->user()->trainer_code)
                                        <li><a href="{{route('sport.trainer.code')}}">Получить код</a></li>
                                    @endif

                                    @if(auth()->user()->trainer_code)
                                        <li><a href="#">{{auth()->user()->trainer_code}}</a></li>
                                    @endif
                                    @if(auth()->user()->trainer_code)
                                        <li><a href="{{route('sport.trainer.remove')}}">Удалить тренера</a></li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            @if(auth()->user()->isAdmin())
                <li><a href="{{route('admin.users.index')}}">админ</a></li>
            @endif
            @if(auth()->user()->isTrainer())
                <li><a href="{{route('trainer.users.index')}}">тренер</a></li>
            @endif
            @if(auth()->user()->isModerator())
                <li><a href="{{route('book.moderator.users.index')}}">модератор</a></li>
            @endif
            @if(auth()->user()->isManager())
                <li><a href="{{route('shop.manager.users')}}">менеджер</a></li>
            @endif
            <li><a href="{{route('logout')}}">{{ __('gym.log_out')}}</a></li>
        </ul>
    </div>
</nav>
