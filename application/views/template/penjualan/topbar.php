
    <!-- Page Title-->
    <div class="page-title d-flex" aria-label="Page title" style="background-image" url="(<?= base_url(); ?>assets/penjualan/img/page-title/shop-pattern.jpg);">
      <div class="container text-left align-self-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              Home
            </li>
            <li class="breadcrumb-item">
              <?= $title ?>
            </li>
          </ol>
        </nav>
        <h1 class="page-title-heading"><?= $title ?></h1>
        <div class="page-title-subheading">
           <!-- alert -->
            <?= $this->session->flashdata('message'); ?>
        </div>
      </div>
    </div>