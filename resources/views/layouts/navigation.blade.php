<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->branch->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>
            @if(Auth::user()->role->name == 'system admin')
            <li class="nav-item">
                <a href="{{ route('branch.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-code-branch"></i>
                    <p>
                        {{ __('Departments') }}
                    </p>
                </a>
            </li>
            @endif
            {{--<li class="nav-item">
                <a href="{{ route('tank.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-pump-soap"></i>
                    <p>
                        {{ __('Tanks') }}
                    </p>
                </a>
            </li>--}}

           {{-- <li class="nav-item">
                <a href="{{ route('pump.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-gas-pump"></i>
                    <p>
                        {{ __('Pumps') }}
                    </p>
                </a>
            </li>--}}

            {{--<li class="nav-item">
                <a href="{{ route('about') }}" class="nav-link">
            <i class="nav-icon far fa-address-card"></i>
            <p>
                {{ __('About us') }}
            </p>
            </a>
            </li>--}}

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
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-list nav-icon"></i>
                    <p>
                        Master data
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ route('patient.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Medical partners</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('reciept.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Non patients</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-list nav-icon"></i>
                    <p>
                        Payments
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ route('patient.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Medical partners</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('reciept.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Non patients</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="/medicalaid" class="nav-link">
                    <i class="nav-icon fa fa-money nav-icon"></i>
                    <p>
                        Methods and Packages
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-pump-soap nav-icon"></i>
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

            @if(Auth::user()->role->name == 'system admin')
            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('Users') }}
                    </p>
                </a>
            </li>
            @endif
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->