<aside class="main-sidebar elevation-4 sidebar-light-info">
    <!-- Brand Logo -->
    <a href="{{ route('home')  }}" class="brand-link">
        SAD - F&H

        {{--        <span class="brand-text font-weight-light" style="text-align: center; display: block">--}}
        {{--            {{ config('app.name') }}--}}
        {{--        </span>--}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('salas.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Salas</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/turmas" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Turmas</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
