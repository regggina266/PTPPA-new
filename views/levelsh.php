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
                            <h3 class="m-0">Level</h3>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</a></li>
                                <li class="breadcrumb-item active">Level</li>
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
                                                        <th scope="col">Nama</th>
                                                        <th scope="col">Level</th>
                                                        <th scope="col">Status Level</th>
                                                        <th scope="col">Departemen</th>
                                                    </tr>
                                                </thead>
                                                <?php $no = 1;
                                                foreach ($level as $level) : ?>
                                                <tbody>
                                                    <tr>
                                                        <th><?= $no++ ?></th>
                                                        <th><?= $level->nama ?></th>
                                                        <th><?= $level->level_k ?></th>
                                                        <th><?= $level->status_level ?></th>
                                                        <th><?= $level->departemen ?></th>
                                                    </tr>
                                                </tbody>
                                            <?php endforeach ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>  
                    <!-- data table end -->
                </body>
                </html>