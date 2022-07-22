<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <span class="nav-link">
                <span class="font-weight-bold name">{{ \Illuminate\Support\Facades\Auth::user()->name ?? 'Admin' }}</span>
            </span>
        </li>
        <li class="nav-item dropdown">
            <span class="nav-link">
                <i class="far fa-user-circle"></i>
            </span>
        </li>
    </ul>
</nav>

