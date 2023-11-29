 <!DOCTYPE html>
<html lang="en">

<head>
   
</head>

<body class="hold-transition sidebar-mini layout-fixed">


  <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h3 class="m-0">Laporan</h3>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</a></li>
                                <li class="breadcrumb-item active">Laporan</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
    <!-- order list area start -->
         <div class="card mt-5">
                <div class="card-body">
                            <div id="dataTable_filter" class="dataTables_filter">
                                <div style="display: flex; justify-content: space-between;">
                                    <div>
                                        Show
                                        <div style="display: flex;"> 
                                            <div style="width: 7em">
                                            <select name="dataTable_length " aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                            </div> 
                                            <span class="ml-3">entries</span>
                                        </div>
                                    </div>
                                    <label>
                                        Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
                                    </label>  
                                </div>
                                    <div class="table-responsive">
                                        <table id="datatable-buttons" class="table table-bordered table-striped nowrap w-100 text-center">
                                            <thead class="text-uppercase bg-dark">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Kode Surat</th>
                                                    <th scope="col">Nama Barang</th>
                                                    <th scope="col">Jumlah</th>
                                                    <th scope="col">Rincian</th>
                                                    <th scope="col">Agenda</th>
                                                    <th scope="col">Tanggal Agenda</th>
                                                    <th scope="col">NRP</th>
                                                </tr>
                                            </thead>
                                            <?php $no = 1;
                                             foreach ($laporan as $laporan) : ?>
                                            <tbody>
                                            <tr>
                                                <th><?= $no++ ?></th>
                                                <th><?= $laporan->kode_surat ?></th>
                                                <th><?= $laporan->nama_barang ?></th>
                                                <th><?= $laporan->jumlah ?></th>
                                                <th><?= $laporan->rincian ?></th>
                                                <th><?= $laporan->agenda ?></th>
                                                <th><?= $laporan->tanggal_agenda ?></th>
                                                <th><?= $laporan->NRP ?></th>
                                            </tr>
                                             </tbody>
                                        <?php endforeach ?>
                                    </table>
                                    </div>
                                </div>
                            </div>
                    </div>
</div>
</body>
</html>