<nav class=" navbar navbar-expand bg-primary text-white">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" role="button"><i class="fa fa-user"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a role="button" class="nav-link">{{session('user_nama')}}</a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" role="button">
                <div style="color:white" id="waktu"></div>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" role="button" data-toggle="dropdown"><i class="fa fa-cogs"></i></a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <i class="fa fa-user mr-2"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout')  }}" class="dropdown-item">
                    <i class="fa fa-sign-out mr-2"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
