<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('img/bec-logo.png')}}" alt="Bec Logo" class="brand-image img-circle elevation-5" style="opacity: .8">
        <span class="brand-text font-weight-light">Bec</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('dashboard.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-home"></i>
                        <p>Tableau de Bord</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.user.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-home"></i>
                        <p>Gestion Utilisateur</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
