 <!DOCTYPE html>
<html lang="en">

<head>
    
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h3 class="m-0">Dashboard | Admin </h3>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
 <!-- Main content -->
        <section class="content">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-md-4">
                            <div class="col-lg-3 col-6">
                                <div class="card" style="align-self: flex-start;">
                                    <div class="seo-fact sbg1" style="width: 350px;">
                                        <div class="p-3 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-user"></i> Akun</div>
                                             <h2><?= $this->db->count_all_results('akun'); ?></h2>
                                        </div>
                                        <canvas id="seolinechart1" width="20" height="20"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-md-4">
                            <div class="col-lg-3 col-6">
                                <div class="card" style=" flex-start;">
                                    <div class="seo-fact sbg2" style="width: 350px;">
                                        <div class="p-3 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-stats-up"></i> Level</div>
                                            <h2><?= $this->db->count_all_results('level'); ?></h2>
                                        </div>
                                        <canvas id="seolinechart2" width="20" height="20"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <!-- ./col -->
                       <div class="col-md-4">
                            <div class="col-md-3 mt-7 mb-3">
                                <div class="card" style=" flex-start;">
                                    <div class="seo-fact sbg4" style="width: 340px;">
                                        <div class="p-3 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-bookmark-alt"></i> Laporan</div>
                                            <h2><?= $this->db->count_all_results('laporan'); ?></h2>
                                        </div>
                                        <canvas id="seolinechart4" width="20" height="20"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>    
                        </div>   
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        <br><br>
        <div class="col-lg-30">
            <div class="card ribbon-box">
                <div class="card-body bg-danger">
                    <p class="text-light float-start mt-0">Hallo <?= $this->session->userdata('nama'); ?> 👋</p>
                    <div class="ribbon-content">
                        <p class="text-light mb-0"><br>Selamat datang di Sistem Informasi Manajemen Laporan
                            <br>PT Putra Perkasa Abadi
                        </p>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div> <!-- end col-->
</div>
<!-- end row-->
</html>