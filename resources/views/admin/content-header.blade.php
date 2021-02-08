<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @include('layouts.errors')
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li>

            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="get" class="d-none">
                {{csrf_field()}}
            </form>
        </li>
    </ol>
</section>
