
    <!-- Footer-->
    <footer class="bg-dark pt-5">
      <!-- Second Row-->
      <div class="pt-5">
        <div class="container">
          <div class="row">
            <!-- Contacts-->
            <div class="col-lg-3 col-sm-6">
              <div class="widget widget-contacts widget-light-skin mb-4">
                <h4 class="widget-title">Kontak</h4>
                <ul>
                  <li>
                    <i class="fe-icon-map-pin"></i>
                    <span>Alamat</span>
                    <a href="#"><?= $dashboard['alamat']; ?></a>
                  </li>
                  <li><i class="fe-icon-phone"></i>
                    <span>Whatsapp</span
                      ><a href="tel:00180039025"><?= $dashboard['telepon']; ?></a>
                    </li>
                  <li>
                    <i class="fe-icon-mail"></i>
                    <span>Email</span>
                    <a href="mailto:info@example.com"><?= $dashboard['email']; ?></a>
                  </li>
                </ul>
              </div>
              <div class="widget pt-2">
                <a class="social-btn sb-style-6 sb-youtube sb-light-skin" href="<?= $dashboard['youtube']; ?>">
                  <i class="socicon-youtube"></i>
                </a>
                <a class="social-btn sb-style-6 sb-facebook sb-light-skin" href="<?= $dashboard['facebook']; ?>">
                  <i class="socicon-facebook"></i>
                </a>
                <a class="social-btn sb-style-6 sb-whatsapp sb-light-skin" href="<?= $dashboard['whatsap']; ?>">
                  <i class="socicon-whatsapp"></i>
                </a>
                <a class="social-btn sb-style-6 sb-instagram sb-light-skin" href="<?= $dashboard['instagram']; ?>">
                  <i class="socicon-instagram"></i>
                </a>
              </div>
            </div>
            <!-- penjualan -->
            <div class="col-lg-6">
              <div class="widget widget-light-skin mb-0">
                <h4 class="widget-title">Penjualan</h4>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="widget widget-categories widget-light-skin">
                    <ul>
                      <li><a href="https://www.youtube.com/channel/UCtDCqelC1smHXm1svF-Ftng">Tentang Kita</a></li>
                      <li><a href="https://www.instagram.com/kopipalasari/">Bingkai Kopi Palasari 1</a></li>
                      <li><a href="https://www.instagram.com/bingkaikopipalasari02/">Bingkai Kopi Palasari 2</a></li>
                      <li><a href="https://www.instagram.com/palasarikopi03/">Bingkai Kopi Palasari 3</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="widget widget-categories widget-light-skin">
                    <ul>
                      <li><a href="https://www.youtube.com/channel/UCtDCqelC1smHXm1svF-Ftng">Official Palasari</a></li>
                      <li><a href="https://www.youtube.com/channel/UCtDCqelC1smHXm1svF-Ftng">Girisenang TV</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- expedisi -->
            <div class="col-lg-3">
              <div class="widget widget-light-skin mb-0">
                <h4 class="widget-title">Expedisi</h4>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="widget widget-categories widget-light-skin">
                    <ul>
                      <li><a href="https://www.jne.co.id/id/beranda">JNE</a></li>
                      <li><a href="https://www.posindonesia.co.id/id">POS</a></li>
                      <li><a href="https://tiki.id/id/beranda">TIKI</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <hr class="hr-light">
          <div class="d-md-flex justify-content-between align-items-center py-4 text-center text-md-left">
            <div class="order-2">
              <a class="footer-link text-white" href="<?= base_url(); ?>penjualan/tentang_kami">Tentang kami</a>
              <a class="footer-link text-white ml-3" href="<?= base_url(); ?>penjualan/kontak">Info</a>
            </div>
            <p class="m-0 text-sm text-white order-1">
              <span class='opacity-60'>Copyright &copy; Agroindustri Kopi Giri Mekar <?= date('Y'); ?></span> 
              <i class='d-inline-block align-middle fe-icon-heart text-danger'></i> 
            </p>
          </div>
        </div>
      </div>
    </footer>
    <!-- Back To Top Button-->
    <a class="scroll-to-top-btn" href="#">
      <i class="fe-icon-chevron-up"></i>
    </a>
    <!-- Backdrop-->
    <div class="site-backdrop"></div>
    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script src="<?= base_url(); ?>assets/penjualan/js/vendor.min.js"></script>
    <script src="<?= base_url(); ?>assets/penjualan/js/theme.min.js"></script>
  </body>
</html>