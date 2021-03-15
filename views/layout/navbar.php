<nav class="main-header navbar navbar-expand bgc-yellow navbar-dark">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link nvlnk" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <div class="nav-link">
                <span class="text-light">Balai Karantina Pertanian Kelas II Gorontalo</span>
            </div>
        </li>
    </ul>
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item">
            <div class="nav-link">
                <span class="mailbox-read-time text-light"><i id="date"></i><i id="clock"></i></span>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link nvlnk" href="<?= $url; ?>app/logout.php" onclick="confirm('Yakin ingin keluar dari halaman ini?')">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </a>
        </li>
    </ul>

</nav>