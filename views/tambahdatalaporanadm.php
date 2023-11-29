<!-- page title area start -->
<div class="main-content-inner">
                <div class="row">
                    <div class="col-lg-12 col-ml-12">
                        <div class="row">
                            <!-- Textual inputs start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Tambah Laporan</h4>
                                        <form action="<?php echo site_url('laporanadm/tambah_laporan'); ?>" method="post">
                                        <div class="form-group">
                                                <label class="col-form-label">Pengaju:</label>
                                                <select name="nama" class="form-control" id="nama">
                                                <option value="">Select</option>
                                                <?php foreach ($laporan as $item): ?>
                                                        <option value="<?= $item['idakun'] ?>"><?= $item['nama'] ?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Jenis Laporan:</label>
                                                <select name="idjenis" class="form-control" id="idjenis">
                                                    <option value="">Select</option>
                                                    <option value="1">RKB</option>
                                                    <option value="2">RAB</option>
                                                    <option value="3">TCAR</option>
                                                    <option value="4">RKP</option>
                                                    <option value="5">PVP</option>
                                                    <option value="6">Usulan Peserta</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Kode Surat</label>
                                                <input class="form-control" type="text" value="" id="example-text-input" name="kode_surat" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Nama Barang</label>
                                                <input class="form-control" type="text" value="" id="example-text-input" name="nama_barang" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Jumlah</label>
                                                <input class="form-control" type="text" value="" id="example-text-input" name="jumlah" required>
                                            </div>
                                             <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Rincian</label>
                                                <input class="form-control" type="text" value="" id="example-text-input" name="rincian" required>
                                            </div>
                                             <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Agenda</label>
                                                <input class="form-control" type="text" value="" id="example-text-input" name="agenda" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Tanggal Agenda</label>
                                                <input class="form-control" type="date" name="tanggal_agenda" required>
                                            </div>
                                             <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">NRP</label>
                                                <input class="form-control" type="text" value="" id="example-text-input" name="NRP" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="file">File</label>
                                                <input type="file" class="form-control" id="file" aria-describedby="file" name="file" >
                                            </div>
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