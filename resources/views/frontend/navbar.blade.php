<nav class=" navbar navbar-expand navbar-dark navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-user"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a role="button" class="nav-link">{{session('user_nama')}}</a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" role="button">
                <b style="color:#0cff00">Dijawab :</b> <b id="dijawab"></b> &nbsp;&nbsp;
                <b style="color:#f6ff00">Ragu-ragu :</b> <b id="ragu-ragu"></b>&nbsp;&nbsp;
                <b style="color:#007bff">Belum Dijawab :</b> <b id="belumdijawab"></b>&nbsp;&nbsp;
            </a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" role="button">
                <div style="color:white" id="waktu"></div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" role="button"><i class="fas fa-cogs"></i></a>
        </li>
    </ul>
</nav>
