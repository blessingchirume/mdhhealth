<ul class="nav nav-treeview" style="display: none;">
    @foreach($menu->children as $child)
    <li class="nav-item">
        <a href="{{ route($child->url) }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>{{ $child->display_name }}</p>
        </a>
    </li>
    @endforeach
</ul>