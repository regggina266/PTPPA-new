<div class="form-group">
                                                <label class="col-form-label">Level</label>
                                                <select name="level_k" class="form-control" id="level_k">
                                                    <option value="">Select</option>
                                                    <?php foreach ($level as $row): ?>
                                                        <option value="<?= $row['level_k'] ?>"><?= $row['level_k'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>       

                                            <select name="idlevel" class="form-control" id="idlevel">
                                                <option value="<?php echo $akun->idlevel; ?>">Pilih Level</option>
                                                <?php foreach ($level as $row) : ?>
                                                    <option value="<?= $row->idlevel; ?>"><?= $row->level_k; ?></option>
                                                <?php endforeach; ?>
                                            </select>

                                        </div>
                                        <div class="pagination_area pull-right mt-5">
                                            <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                                        </div>
                                    </form>
                        </div>
                    </div>
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