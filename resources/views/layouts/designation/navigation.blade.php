<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->designation->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
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
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
