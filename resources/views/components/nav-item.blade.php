<ul aria-labelledby="dropdownSubMenu{{ $menu->depth }}" class="dropdown-menu border-0 shadow">
    @foreach($menu->children as $child)
    @can($child->permission)
    <li class="dropdown-divider"></li>
    <li class="dropdown-submenu dropdown-hover">
        @if($child->url)
        <a id="dropdownSubMenu{{$menu->depth}}" href="{{ route($child->url) }}" role="button" data-toggle="{{ $child->children->count() ? 'dropdown' : null }}" aria-haspopup="true" aria-expanded="false" class="dropdown-item <?php if ($child->children->count()) echo ('dropdown-toggle') ?>">{{ $child->display_name}}</a>
        @else
        <a id="dropdownSubMenu{{$menu->depth}}" href="#" role="button" data-toggle="{{ $child->children->count() ? 'dropdown' : null }}" aria-haspopup="true" aria-expanded="false" class="dropdown-item <?php if ($child->children->count()) echo ('dropdown-toggle') ?>">{{ $child->display_name}}</a>
        @endif
        @if($child->children->count())
        <x-nav-item :menu="$child" />
        @endif
    </li>
    @endcan
    @endforeach
</ul>