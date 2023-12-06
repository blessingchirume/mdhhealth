<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar Menu -->
    @if(Auth::user()->role->name == 'system admin')
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-chart-bar"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('designation.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-code-branch"></i>
                    <p>
                        {{ __('Departments') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-clock nav-icon"></i>
                    <p>
                        Modules
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ route('patient.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Billing</p>
                        </a>
                    </li>
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
            <li class="nav-item">
                <a href="{{ route('payment.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-money-bill-alt nav-icon"></i>
                    <p>
                        Payments
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/medicalaid" class="nav-link">
                    <i class="nav-icon fas fa-shuttle-van"></i>
                    <p>
                        Providers
                    </p>
                </a>
            </li>
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
            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('Users') }}
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    @else
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-chart-bar"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-clock nav-icon"></i>
                    <p>
                        Modules
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ route('patient.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Statistics</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('patient.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Patients</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('patient.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Inventory</p>
                        </a>
                    </li>
                </ul>
            </li>
            @if(Auth::user()->role->name == 'clinic')
            <li class="nav-item">
                <a href="{{ route('payment.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-money-bill-alt nav-icon"></i>
                    <p>
                        Payments
                    </p>
                </a>
            </li>
            @endif
        </ul>
    </nav>
    @endif
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->