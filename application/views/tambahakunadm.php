 <!-- page title area start -->
            <div class="main-content-inner">
                <div class="row">
                    <div class="col-lg-12 col-ml-12">
                        <div class="row">
                            <!-- Textual inputs start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Tambah Akun</h4>
                                        <form action="<?php echo site_url('akunms/tambah_akun'); ?>" method="post">
                                        
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Nama</label>
                                                <input class="form-control" type="text" value="" id="example-text-input" name="nama" required placeholder="Nama">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">NRP</label>
                                                <input class="form-control" type="text" value="" id="example-text-input" name="NRP" required placeholder="NRP">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="password" required placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Level</label>
                                                <select name="level_k" class="form-control" id="level_k">
                                                    <option value="">Select</option>
                                                    <?php foreach ($levels as $level): ?>
                                                        <option value="<?= $level['idlevel'] ?>"><?= $level['level_k'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Departemen</label>
                                                <select name="devisi" class="form-control" id="devisi">
                                                    <option value="">Select</option>
                                                    <?php foreach ($departemen as $departemen): ?>
                                                        <option value="<?= $departemen['iddepartemen'] ?>"><?= $departemen['devisi'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>                                          
                                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

                                            <button type="submit" value="simpan" class="btn btn-primary btn-sm">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- basic form end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jquery latest version -->
    <script src="<?= base_url('')?>assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="<?= base_url('')?>assets/js/popper.min.js"></script>
    <script src="<?= base_url('')?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url('')?>assets/js/owl.carousel.min.js"></script>
    <script src="<?= base_url('')?>assets/js/metisMenu.min.js"></script>
    <script src="<?= base_url('')?>assets/js/jquery.slimscroll.min.js"></script>
    <script src="<?= base_url('')?>assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="<?= base_url('')?>https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="<?= base_url('')?>https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="<?= base_url('')?>https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "<?= base_url('')?>https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="<?= base_url('')?>assets/js/line-chart.js"></script>
    <!-- all bar chart activation -->
    <script src="<?= base_url('')?>assets/js/bar-chart.js"></script>
    <!-- all pie chart -->
    <script src="<?= base_url('')?>assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="<?= base_url('')?>assets/js/plugins.js"></script>
    <script src="<?= base_url('')?>assets/js/scripts.js"></script>
</body>

</html>