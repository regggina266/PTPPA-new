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
                                        Search:<input type="search" class="form-control form-control-sm" placeholder="search" aria-controls="dataTable">
                                    </label>  
                                </div>
                                    <div class="table-responsive">
                                         <table id="datatable-buttons" class="table table-bordered table-striped nowrap w-100 text-center">
                                            <thead class="text-uppercase bg-dark">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">NRP</th>
                                                    <th scope="col">Password</th>
                                                    <th scope="col">Level</th>
                                                </tr>
                                            </thead>
                                            <?php $no = 1;
                                             foreach ($akun as $akun) : ?>
                                            <tbody>
                                                <tr>
                                                    <th><?= $no++ ?></th>
                                                    <th><?= $akun->nama ?></th>
                                                    <th><?= $akun->NRP ?></th>
                                                    <th><?= $akun->password ?></th>
                                                    <th><?= $akun->idlevel ?></th>
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