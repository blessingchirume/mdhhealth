<div class="sidebar">
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            {{-- <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
            <i class="nav-icon fas fa-chart-bar"></i>
            <p>
                {{ __('Dashboard') }}
            </p>
            </a>
            </li>
            @can(App\constants\PermisionConstants::viewDepartments)
            <li class="nav-item">
                <a href="{{ route('designation.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-code-branch"></i>
                    <p>
                        {{ __('Departments') }}
                    </p>
                </a>
            </li>
            @endcan
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-clock nav-icon"></i>
                    <p>
                        Modules
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    @can(App\constants\PermisionConstants::viewPatients)
                    <li class="nav-item">
                        <a href="{{ route('patient.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Billing</p>
                        </a>
                    </li>
                    @endcan
                    <li class="nav-item">
                        <a href="{{ route('reciept.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Stores</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('reciept.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Credit Control</p>
                        </a>
                    </li>
                </ul>
            </li>
            @can(App\constants\PermisionConstants::viewPayments)
            <li class="nav-item">
                <a href="{{ route('payment.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-money-bill-alt nav-icon"></i>
                    <p>
                        Payments
                    </p>
                </a>
            </li>
            @endcan
            @can(App\constants\PermisionConstants::viewProviders)
            <li class="nav-item">
                <a href="/medicalaid" class="nav-link">
                    <i class="nav-icon fas fa-shuttle-van"></i>
                    <p>
                        Providers
                    </p>
                </a>
            </li>
            @endcan
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-luggage-cart"></i>
                    <p>
                        Inventory
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ route('item.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Items</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('reciept.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Reciepts</p>
                        </a>
                    </li>
                </ul>
            </li>
            @can(App\constants\PermisionConstants::viewUserMaster)
            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('Users') }}
                    </p>
                </a>
            </li>
            @endcan--}}

            @foreach(Config::get('menu') as $menu)
            <li class="nav-item">
                @if($menu->url)
                <a href="{{ route($menu->url) }}" class="nav-link">
                @else
                <a href="#" class="nav-link">
                @endif
                    <i class="nav-icon fas {{ $menu->icon }}"></i>
                    <p>
                        {{ $menu->display_name }}
                        <!-- <i class="fas fa-angle-left right"></i> -->
                    </p>
                </a>
                <x-menu-item :menu="$menu" />
            </li>
            @endforeach
        </ul>
    </nav>
</div>