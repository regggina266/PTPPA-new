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
                            <h3 class="m-0">Approval</h3>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</a></li>
                                <li class="breadcrumb-item active">Approval</li>
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
                                                    <th scope="col">Agenda</th>
                                                    <th scope="col">NRP</th>
                                                    <th scope="col">Tanggal Ajuan</th>
                                                    <th scope="col">File</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <?php $no = 1;
                                             foreach ($laporan as $laporan) : ?>
                                            <tbody>
                                            <tr>
                                                <th><?= $no++ ?></th>
                                                <th><?= $laporan->agenda ?></th>
                                                <th><?= $laporan->NRP ?></th>
                                                <th><?= $laporan->tgl_ajuan ?></th>
                                                
                                                <td>
                                                    <label for="file-upload" class="btn btn-dark btn-sm">
                                                        <i class="ti-files" title="Upload File"></i>
                                                        <input type="file" id="file-upload" class="d-none" name="userfile">
                                                    </label>
                                                </td>
                                                <td style="text-align:center">
                                                    <ul class="d-flex justify-content-center">
                                                <div class="">
                                                    <li class="mr-3"><a href="<?php echo base_url('Laporanadm/edit/'. $laporan->idbarang) ?>"  class="btn btn-warning" class="text-warning"><i class="fa fa-edit"title="Edit"></i></a></li>                                        
                                                </div>
                                              <a>
                                                <div class="">
                                                    <button type="submit" class="btn btn-primary"><i class="ti-check" title="kirim"></i></button>
                                                </div>
                                              </a>
                                                    </ul>
                                                </td>
                                            </tr>
                                             <?php endforeach ?>
                                         </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                    </div>
        </div>
    </body>
</html>