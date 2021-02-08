<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li class="treeview">
    </li>
    <li><a href="{{route('admin.users.index')}}"><i class="fa fa-users"></i> <span>Пользователи</span></a></li>
    <li><a href="{{route('admin.programs.index')}}"><i class="fa fa-list"></i> <span>Программы</span></a></li>
    <li><a href="{{route('admin.categories.index')}}"><i class="fa fa-trophy"></i> <span>Упражнения</span></a></li>
    <li class="treeview">
        <a href="#"><i class="fa fa-cogs"></i> <span>Разное</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{route('admin.desc_equipment.index')}}">Снаряжение</a></li>
            <li><a href="{{route('admin.difficulties.index')}}">Сложность</a></li>
            <li><a href="{{route('admin.equipment.index')}}">Снаряжение2</a></li>
            <li><a href="{{route('admin.genders.index')}}">Пол м-ж</a></li>
            <li><a href="{{route('admin.muscles.index')}}">Мышци</a></li>
            <li><a href="{{route('admin.places.index')}}">Место</a></li>
            <li><a href="{{route('admin.purposes.index')}}">Цель</a></li>
            <li><a href="{{route('admin.specifics.index')}}">specifics</a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-cogs"></i> <span>Разное2</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.strings.index')}}">Язык2</a></li>
                </ul>
            </li>

        </ul>
    <li><a href="{{route('admin.bots')}}"><i class="fa fa-sign"></i> <span>Боты</span></a></li>

</ul>


