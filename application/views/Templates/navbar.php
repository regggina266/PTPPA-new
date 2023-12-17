<style>
    .sidebar-menu{
        left: 0;
    }
</style>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="ti-menu"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="ti-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="<?= base_url();?>Login/logout" class="dropdown-item notify-item">Logout</a>
            </div>
        </li>
                <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" role="button" onclick="fullscreen();">
                <i class="ti-fullscreen"></i>
            </a>
        </li>

    </ul>
</nav>