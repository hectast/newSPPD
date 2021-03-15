  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link bgc-yellow text-light">
          <img src="<?= $url; ?>assets/dist/img/LOGO1.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light"><b>SPPD</b> APP</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="<?= $url; ?>assets/dist/img/adminlogo.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block"><?= $_SESSION['namadmin']; ?></a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="<?= $url; ?>index.php" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>

                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-folder-open"></i>
                          <p>
                              Master Data
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="<?= $url; ?>views/page/master_data/adminspd.php" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Admin</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?= $url; ?>views/page/master_data/pjspd.php" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Penanggung Jawab</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?= $url; ?>views/page/master_data/pelaksanaspd.php" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Pelaksana Perjalanan</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?= $url; ?>views/page/master_data/ppk.php" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>PPK</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?= $url; ?>views/page/master_data/bendahara.php" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Bendahara</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?= $url; ?>views/page/master_data/kabalai.php" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Kepala Balai</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fab fa-wpforms"></i>
                          <p>
                              Isian
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="<?= $url; ?>views/page/Isian/tampil_cetakspd.php" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>SPD</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?= $url; ?>views/page/Isian/rincian/tampil_cetakrincian.php" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Rincian</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?= $url; ?>views/page/isian/riil.php" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Pengeluaran Riil</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-file-alt"></i>
                          <p>
                              Laporan
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="<?= $url; ?>views/page/laporan/laporan_umum.php" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Laporan Umum</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?= $url; ?>views/page/laporan/laporan_jumlah_hari.php" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Jumlah Hari</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?= $url; ?>views/page/laporan/laporan_jmlh_hari.php" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Cetak Jumlah Hari</p>
                              </a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>