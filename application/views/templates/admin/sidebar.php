<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <div class="sidebar-brand-icon rotate-n-15">
      <img src="<?= base_url('assets/img/sisrepawa.png'); ?>" alt="..." class="img-thumbnail">
    </div>
    <div class="sidebar-brand-text mx-3">SISREPAWA</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  <br>
  <style>
    .img-profile {
      width: 5em;
      height: 5em;
      box-shadow: -4px 3px 4px rgba(0, 0, 0, 0.5);
    }
  </style>
  <div class="wrap user-info" style="text-align: center;">
    <img class="img-profile rounded-circle" src="<?= base_url() . '/assets/img/admin/' . $this->session->userdata('foto_admin'); ?>">
    <br>
    <br>
    <span class="mt-3 d-none d-lg-inline text-white medium"><?php echo $this->session->userdata('nama_admin'); ?></span>
  </div>
  <!-- Nav Item - Dashboard -->
  <?php if ($title == 'Dashboard') : ?>
    <li class="nav-item active">
    <?php else : ?>
    <li class="nav-item">
    <?php endif; ?>

    <a class="nav-link" href="<?= base_url('c_dashboard'); ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Kelola Data Admin :
    </div>

    <!-- Nav Item - Admin -->
    <?php if ($title == 'Admin' || $title == 'Tambah Data Admin' || $title == 'Edit Data Admin') : ?>
      <li class="nav-item active">
      <?php else : ?>
      <li class="nav-item">
      <?php endif; ?>
      <a class="nav-link" href="<?= base_url('c_admin/tampil_data'); ?>">
        <i class="far fa-user"></i>
        <span>Admin</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Kelola Data Wisata :
      </div>
      <!-- Divider -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data Wisata</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <?php if ($title == 'Destinasi Tujuan' || $title == 'Tambah Data Destinasi Tujuan' || $title == 'Tambah Data Destinasi Tujuan') : ?>
              <a class="collapse-item active" href="<?= base_url('c_destinasi_tujuan/tampil_data'); ?>">Destinasi Tujuan</a>
            <?php else : ?>
              <a class="collapse-item" href="<?= base_url('c_destinasi_tujuan/tampil_data'); ?>">Destinasi Tujuan</a>
            <?php endif; ?>
            <?php if ($title == 'Penginapan' || $title == 'Tambah Data Penginapan' || $title == 'Tambah Data Penginapan') : ?>
              <a class="collapse-item active" href="<?= base_url('c_penginapan/tampil_data'); ?>">Penginapan</a>
            <?php else : ?>
              <a class="collapse-item" href="<?= base_url('c_penginapan/tampil_data'); ?>">Penginapan</a>
            <?php endif; ?>
            <?php if ($title == 'Tempat Makan' || $title == 'Tambah Data Tempat Makan' || $title == 'Tambah Data Tempat Makan') : ?>
              <a class="collapse-item active" href="<?= base_url('c_tempat_makan/tampil_data'); ?>">Tempat Makan</a>
            <?php else : ?>
              <a class="collapse-item" href="<?= base_url('c_tempat_makan/tampil_data'); ?>">Tempat Makan</a>
            <?php endif; ?>
            <?php if ($title == 'TIC' || $title == 'Tambah Data TIC' || $title == 'Tambah Data TIC') : ?>
              <a class="collapse-item active" href="<?= base_url('c_tic/tampil_data'); ?>">TIC</a>
            <?php else : ?>
              <a class="collapse-item" href="<?= base_url('c_tic/tampil_data'); ?>">TIC</a>
            <?php endif; ?>
            <div class="collapse-divider"></div>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider my-9">
      <!-- Heading -->
      <div class="sidebar-heading">
        Kelola Paket Wisata :
      </div>
      <!-- Nav Item - Paket Wisata -->
      <?php if ($title == 'Paket Wisata' || $title == 'Tambah Data Paket Wisata' || $title == 'Edit Data Paket Wisata') : ?>
        <li class="nav-item active">
        <?php else : ?>
        <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link" href="<?= base_url('c_paket_wisata/tampil_data'); ?>">
          <i class="fas fa-box"></i>
          <span>Paket Wisata</span></a>
        </li>

        <hr class="sidebar-divider my-9">
        <!-- Heading -->
        <div class="sidebar-heading">
          Kelola Sistem Pengambilan Keputusan :
        </div>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>SPK SAW</span>
          </a>
          <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <?php if ($title == 'Data Kriteria' || $title == 'Tambah Data Data Kriteria' || $title == 'Tambah Data Data Kriteria') : ?>
                <a class="collapse-item active" href="<?= base_url('c_kriteria'); ?>">Data Kriteria</a>
              <?php else : ?>
                <a class="collapse-item" href="<?= base_url('c_kriteria'); ?>">Data Kriteria</a>
              <?php endif; ?>
              <?php if ($title == 'Data Penilaian Paket Wisata' || $title == 'Tambah Data Data Penilaian Paket Wisata' || $title == 'Tambah Data Data Penilaian Paket Wisata') : ?>
                <a class="collapse-item active" href="<?= base_url('c_penilaian'); ?>">Data Penilaian</a>
              <?php else : ?>
                <a class="collapse-item" href="<?= base_url('c_penilaian'); ?>">Data Penilaian</a>
              <?php endif; ?>
              <?php if ($title == 'Data SAW' || $title == 'Tambah Data Data SAW' || $title == 'Tambah Data Data SAW') : ?>
                <a class="collapse-item active" href="<?= base_url('c_perangkingan'); ?>">Nilai / Proses SPK</a>
              <?php else : ?>
                <a class="collapse-item" href="<?= base_url('c_perangkingan'); ?>">Nilai / Proses SPK</a>
              <?php endif; ?>
            </div>
          </div>
        </li>

        <hr class="sidebar-divider my-9">
        <!-- Heading -->
        <div class="sidebar-heading">
          Kelola Konten :
        </div>

        <!-- Nav Item - Artikel Destinasi Wisata -->
        <?php if ($title == 'Artikel Destinasi Wisata' || $title == 'Tambah Data Artikel Detinasi Wisata' || $title == 'Tambah Data Artikel Detinasi Wisata') : ?>
          <li class="nav-item active">
          <?php else : ?>
          <li class="nav-item">
          <?php endif; ?>
          <a class="nav-link" href="<?= base_url('c_artikel_destinasi_wisata/tampil_data'); ?>">
            <i class="far fa-newspaper"></i>
            <span>Artikel Destinasi Wisata</span></a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider my-0">

          <!-- Nav Item - Tables -->
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('c_admin/logout'); ?>">
              <i class="fas fa-sign-out-alt"></i>
              <span>Logout</span></a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">

          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>

</ul>
<!-- End of Sidebar -->