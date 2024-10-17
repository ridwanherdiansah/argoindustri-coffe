<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Argoindustri | Girimekar
    </title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="CreateX - Multipurpose Bootstrap Theme">
    <meta name="keywords" content="multipurpose, portfolio, blog, shop, e-commerce, modern, flat style, responsive,  business, corporate, mobile, bootstrap 4, html5, css3, jquery, js, gallery, slider, touch, creative, clean">
    <meta name="author" content="Createx Studio">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url(); ?>assets/penjualan/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url(); ?>assets/penjualan/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>assets/penjualan/favicon-16x16.png">
    <link rel="manifest" href="<?= base_url(); ?>assets/penjualan/site.webmanifest">
    <link rel="mask-icon" color="#343b43" href="<?= base_url(); ?>assets/penjualan/safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#603cba">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="<?= base_url(); ?>assets/penjualan/css/vendor.min.css">
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="<?= base_url(); ?>assets/penjualan/css/theme.min.css">
    <!-- Modernizr-->
    <script src="<?= base_url(); ?>assets/penjualan/js/modernizr.min.js"></script>
  </head>

  <!-- Body-->
  <body>
    <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
    <header class="navbar-wrapper navbar-sticky">
      <div class="d-table-cell align-middle pr-md-3">
        <a class="navbar-brand mr-1" href="<?= base_url(); ?>welcome/">
          <img src="<?= base_url(); ?>assets/penjualan/img/logo/logo-dark.png" alt="CreateX"/></a>
        </div>
      <div class="d-table-cell w-100 align-middle pl-md-3">
        <div class="navbar-top d-none d-lg-flex justify-content-between align-items-center">
          <div>
            <a class="social-btn sb-style-3 sb-mail" href="<?= $dashboard['email']; ?>">
              <i class="socicon-mail"></i>
            </a>
            <a class="social-btn sb-style-3 sb-youtube" href="<?= $dashboard['youtube']; ?>">
              <i class="socicon-youtube"></i>
            </a>
            <a class="social-btn sb-style-3 sb-facebook" href="<?= $dashboard['facebook']; ?>">
              <i class="socicon-facebook"></i>
            </a>
            <a class="social-btn sb-style-3 sb-whatsapp" href="<?= $dashboard['whatsap']; ?>">
              <i class="socicon-whatsapp"></i>
            </a>
            <a class="social-btn sb-style-3 sb-instagram" href="<?= $dashboard['instagram']; ?>">
              <i class="socicon-instagram"></i>
            </a>
          </div>

            <?php if (@$_SESSION['user']):?>
            <div>
              <ul class="list-inline mb-0">
                <li class="dropdown-toggle mr-2">
                  <a class="navbar-link" href="">
                    <i class="fe-icon-user"></i>
                    <?= @$_SESSION['user']['nama']; ?>
                  </a>
                  <div class="dropdown-menu right-aligned p-3 text-center" style="min-width: 200px;">
                    <a class="btn btn-primary btn-sm btn-block" href="<?= base_url(); ?>user/profile/<?= @$_SESSION['user']['id_user']; ?>">Profile</a>
                    <hr>
                    <a class="btn btn-primary btn-sm btn-block" href="<?= base_url(); ?>user/history/<?= @$_SESSION['user']['id_user']; ?>">History</a>
                    <a class="btn btn-primary btn-sm btn-block" href="<?= base_url(); ?>auth/user_logout">Logout</a>
                  </div>
                </li>
              </ul>
            </div>
            <?php else :?>
            <div>
              <ul class="list-inline mb-0">
                <li class="dropdown-toggle mr-2">
                  <a class="navbar-link" href="">
                    <i class="fe-icon-user"></i>
                    Login
                  </a>
                  <div class="dropdown-menu right-aligned p-3 text-center" style="min-width: 200px;">
                    <p class="text-sm opacity-70">
                      Login untuk masuk ke <i>account</i> atau registrasi baru untuk memudahkan anda dalam berbelanja.
                    </p>
                    <a class="btn btn-primary btn-sm btn-block" href="<?= base_url(); ?>auth/user_login">Login</a>
                    <p class="text-sm text-muted mt-3 mb-0"><i>Customer</i> baru ? <a href='<?= base_url(); ?>auth/user_registrasi'>Registrasi</a></p>
                  </div>
                </li>
              </ul>
            </div>
            <?php endif;?>
          
        </div>
        <div class="navbar justify-content-end justify-content-lg-between">
          <!-- Main Menu-->
          <ul class="navbar-nav d-none d-lg-block">
            <!-- Kopi-->
            <li class="nav-item mega-dropdown-toggle">
              <a class="nav-link" href="<?= base_url(); ?>penjualan/katalog_kopi">Kopi</a>
            </li>
             <!-- Suplier-->
            <li class="nav-item mega-dropdown-toggle">
              <a class="nav-link" href="<?= base_url(); ?>penjualan/katalog_petani">Petani</a>
            </li>
             <!-- Tentang Kami-->
            <li class="nav-item mega-dropdown-toggle">
              <a class="nav-link" href="<?= base_url(); ?>penjualan/tentang_kami">Tentang Kami</a>
            </li>
            <!-- Components-->
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url(); ?>penjualan/kontak">Kontak</a>
            </li>
          </ul>
          <div>
              <a class="btn btn-gradient ml-3 d-none d-xl-inline-block" href="<?= base_url(); ?>penjualan/Keranjang" target="_blank">
                <i class="fe-icon-shopping-cart"></i> Keranjang
              </a>
          </div>
        </div>
      </div>
    </header>