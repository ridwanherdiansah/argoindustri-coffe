

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>admin/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-seedling"></i>
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>admin/dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Supplier
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Suplier" aria-expanded="true" aria-controls="Suplier">
          <i class="fas fa-fw fa-cog"></i>
          <span>Suplier</span>
        </a>
        <div id="Suplier" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Suplier:</h6>
            <a class="collapse-item" href="<?= base_url(); ?>suplier/petani">Petani</a>
            <a class="collapse-item" href="<?= base_url(); ?>suplier/kopi">Kopi</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGudang" aria-expanded="true" aria-controls="collapseGudang">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Gudang</span>
        </a>
        <div id="collapseGudang" class="collapse" aria-labelledby="headingGudang" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gudang:</h6>
            <a class="collapse-item" href="<?= base_url(); ?>admin/pemasukan">Pemasukan</a>
            <!-- <a class="collapse-item" href="<?= base_url(); ?>admin/pengeluaran">Pengeluaran</a> -->
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Transaksi
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTransaksi" aria-expanded="true" aria-controls="collapseTransaksi">
          <i class="fas fa-fw fa-folder"></i>
          <span>Transaksi</span>
        </a>
        <div id="collapseTransaksi" class="collapse" aria-labelledby="headingTransaksi" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Transaksi</h6>
            <a class="collapse-item" href="<?= base_url(); ?>admin/transaksi">Transaksi</a>
          </div>
        </div>
      </li>

      <!-- Heading -->
      <div class="sidebar-heading">
        FRONTEND
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFrontend" aria-expanded="true" aria-controls="collapseFrontend">
          <i class="fas fa-fw fa-folder"></i>
          <span>Frontend</span>
        </a>
        <div id="collapseFrontend" class="collapse" aria-labelledby="headingFrontend" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">FRONTEND</h6>
            <a class="collapse-item" href="<?= base_url(); ?>admin/header">Header</a>
            <a class="collapse-item" href="<?= base_url(); ?>admin/about">About</a>
            <a class="collapse-item" href="<?= base_url(); ?>admin/content_1">Content 1</a>
            <a class="collapse-item" href="<?= base_url(); ?>admin/content_2">Content 2</a>
            <a class="collapse-item" href="<?= base_url(); ?>admin/content_3">Content 3</a>
            <a class="collapse-item" href="<?= base_url(); ?>admin/contack">Contack</a>
          </div>
        </div>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
