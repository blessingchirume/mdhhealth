<ul class="nav nav-treeview" style="display: none;">
    @foreach($children as $child)
    <li class="nav-item">
        <a href="{{ route($child->url ?? Route::currentRouteName())}}" class="nav-link">
            <i class="far {{ $child->icon }} nav-icon"></i>
            <p>{{ $child->display_name}}</p>
        </a>
    </li>
    @endforeach
</ul>