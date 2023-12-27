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
                    <h3 class="m-0">Pengajuan Barang</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</a></li>
                        <li class="breadcrumb-item active">Barang</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
            <!-- /.content-header -->
    <!-- order list area start -->
    <div class="card mt-5">
        <div class="card-body">
            <a href="<?php echo base_url('Laporanadm/tambah') ?>"><button type="button"  class="btn btn-danger"  data-bs-target="#addlevel"><i class="dripicons-plus"></i> + Tambah Pengajuan</button><br><br></a>
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
                                    <th scope="col">Tanggal Pengajuan</th>
                                    <th scope="col">Pengaju</th>
                                    <th scope="col">Nomor Surat</th>
                                    <th scope="col">Departemen</th>
                                    <th scope="col">Catatan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <?php $no = 1;
                                foreach ($laporan as $laporan) : ?>
                            <tbody>
                            <tr>
                                <th><?= $no++ ?>.</th>
                                <th><?= $laporan->created_date ?></th>
                                <th><?= $laporan->nama ?></th>                       
                                <th><?= $laporan->no_surat ?></th>                        
                                <th><?= $laporan->dept ?></th>                        
                                <th><?= $laporan->catatan ?></th>                       
                                <td style="text-align:center">
                                    <ul class="d-flex justify-content-center">
                                        <!-- <li class="mr-3"><a href="<?php echo base_url('Laporanadm/edit/'. $laporan->id) ?>" class="text-warning"><i class="fa fa-edit"title="Edit"></i></a></li> -->
                                        <li class="mr-3"><a href="<?= base_url('Laporanadm/delete/' . $laporan->id); ?>" class="text-danger"><i class="ti-trash" title="Hapus" onClick="return confirm('Yakin Akan Menghapus Data?');"></i></a></li>
                                        <li class="mr-3"><a target="_blank" href="<?php echo base_url('Generate/index/' . $laporan->id); ?>" ><i class="ti-printer" id='idlaporan' title="Print"></i></a></li>
                                    </ul>
                                    </td>
                            </tr>
                                </tbody>
                        <?php endforeach ?>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>