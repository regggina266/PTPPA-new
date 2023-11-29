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
                            <h3 class="m-0">Akun</h3>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</a></li>
                                <li class="breadcrumb-item active">Akun</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
    <!-- order list area start -->
                <div class="card-body">
                    <a href="<?php echo base_url('Akunadm/tambah') ?>"><button type="button"  class="btn btn-danger"  data-bs-target="#addlevel"><i class="dripicons-plus"></i> + Tambah Akun</button><br><br></a>
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
                                    <div class="navbar-search-block">
                                        <form class="form-inline">
                                            <div class="input-group input-group-sm">
                                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                            <div class="input-group-append">
                                                <button class="btn btn-navbar" type="submit">
                                                <i class="fa fa-search"></i>
                                                </button>
                                               
                                            </div>
                                            </div>
                                        </form>
                                    </div>  
                                </div>
                                    <div class="table-responsive">
                                         <table id="datatable-buttons" class="table table-bordered table-striped nowrap w-100 text-center">
                                            <thead class="text-uppercase bg-dark">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">NRP</th>
                                                    <th scope="col">Level</th>
                                                    <th scope="col">Departemen</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $no = 1;
                                            foreach ($akun as $row) : ?>
                                                <tr>
                                                    <th><?= $no++ ?></th>
                                                    <th><?= $row['nama'] ?></th>
                                                    <th><?= $row['NRP'] ?></th>
                                                    <th><?= $row['level_k'] ?></th>
                                                    <th><?= $row['devisi'] ?></th>
                                                    <td style="text-align:center">
                                                        <ul class="d-flex justify-content-center">
                                                            <li class="mr-3"><a href="<?php echo base_url('Akunadm/edit/'. $row['idakun']) ?>" class="text-warning"><i class="fa fa-edit" title="Edit"></i></a></li>
                                                            <li><a href="<?= base_url('Akunadm/delete/' . $row['idakun']); ?>" class="text-danger"><i class="ti-trash" title="Hapus" onClick="return confirm('Yakin Akan Menghapus Data?');"></i></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>

                                    </div>
                                </div>
                            </div>
                    </div>   
</body>
</html>