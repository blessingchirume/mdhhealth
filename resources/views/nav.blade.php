<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

        @foreach(Config::get('menu') as $menu)
        <li class="nav-item dropdown">
            @if($menu->url)
            <a id="dropdownSubMenu1" href="{{ route($menu->url) }}" data-toggle="{{ $menu->children->count() ? 'dropdown' : null }}" aria-haspopup="true" aria-expanded="false" class="nav-link <?php if ($menu->children->count()) echo ('dropdown-toggle') ?>">{{ $menu->display_name }}</a>
            @else
            <a id="dropdownSubMenu1" href="#" data-toggle="{{ $menu->children->count() ? 'dropdown' : null }}" aria-haspopup="true" aria-expanded="false" class="nav-link <?php if ($menu->children->count()) echo ('dropdown-toggle') ?>">{{ $menu->display_name }}</a>
            @endif
            @if($menu->children->count())
            <x-nav-item :menu="$menu" />
            @endif
        </li>
        @endforeach
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                {{ Auth::user()->name }} {{ Auth::user()->surname }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" style="left: inherit; right: 0px;">
                <a href="{{ route('profile.show') }}" class="dropdown-item">
                    <i class="mr-2 fas fa-file"></i>
                    {{ __('My profile') }}
                </a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="mr-2 fas fa-sign-out-alt"></i>
                        {{ __('Log Out') }}
                    </a>
                </form>
            </div>
        </li>
    </ul>
</nav>