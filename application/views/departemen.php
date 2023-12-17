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
                            <h3 class="m-0">Departemen</h3>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</a></li>
                                <li class="breadcrumb-item active">Departemen</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
    <!-- order list area start -->
         <div class="card mt-5">
                <div class="card-body">
                    <a href="<?php echo base_url('Departemen/tambah') ?>"><button type="button"  class="btn btn-danger"  data-bs-target="#addlevel"><i class="dripicons-plus"></i> + Tambah Departemen</button><br><br></a>
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
                                                    <th scope="col">Nama Departemen</th>
                                                    <th scope="col">Devisi</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <?php $no = 1;
                                             foreach ($departemen as $departemen) : ?>
                                            <tbody>
                                            <tr>
                                                <th><?= $no++ ?></th>
                                                <th><?= $departemen->namadepartemen ?></th>
                                                <th><?= $departemen->devisi ?></th>                                                
                                             
                                                <td style="text-align:center">
                                                    <ul class="d-flex justify-content-center">
                                                        <li class="mr-3"><a href="<?php echo base_url('Departemen/edit/'. $departemen->iddepartemen) ?>" class="text-warning"><i class="fa fa-edit"title="Edit"></i></a></li>
                                                        <li class="mr-3"><a href="<?= base_url('Departemen/delete/' . $departemen->iddepartemen); ?>" class="text-danger"><i class="ti-trash" title="Hapus" onClick="return confirm('Yakin Akan Menghapus Data?');"></i></a></li>                                                       
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
</body>
</html>