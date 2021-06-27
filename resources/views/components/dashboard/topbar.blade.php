<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-black navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">

            </a>
            <div class="dropdown-menu dropdown-menu-xl">

                <div class="dropdown-divider"></div>
                <iframe src="https://discordapp.com/widget?id=649009573692440594&theme=dark" width="360" height="500" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
            </div>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="{{route('landingpage.home')}}" class="nav-link">
                Page d'accueuil
            </a>

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"> </i> {{ auth()->user()->fname}} {{ auth()->user()->lname }}
            </a>
            <div class="dropdown-menu">
                <a href="#" class="dropdown-item">profil</a>
                <a href="{{route('logout')}}" class="dropdown-item">logout</a>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

