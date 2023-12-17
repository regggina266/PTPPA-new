<!-- sidebar menu area start -->
<div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <img src="<?= base_url();?>assets/images/ptppa.png" width="50px" height="50px" alt="ppa"
            class="brand-image img-circle elevation-1" style="opacity: .9">
                   <span><b><font color="white">PT PPA</font></b></span>
                </div>
            </div>
            <div class="main-menu">
                <div style="overflow: hidden;" class="menu-inner">
                     <div style="background: #000 !important" class="user-profile pull-center d-flex">
                              <img class="avatar user-thumb" src="assets/images/author/orang.png" class="img-circle elevation-2" alt="orang">
                            <div class="info">
                                <a href="#" class="text-white" class="d-block"><?=$this->session->userdata('nama');?></a>
                            </div>
                        </div>
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="<?= base_url('dashboardadm') ?>" aria-expanded="true"><i class="ti-home"></i><span><b>Dashboard</b></span></a>
                            </li>
                            <!-- <li>
                                <a style="color: #fff !important" href="<?= base_url('akunadm') ?>" aria-expanded="true"><i style="color: #fff !important" class="ti-user"></i><span><b>Akun</b></span></a>
                            </li> -->
                            <!-- <li>
                                <a style="color: #fff !important" href="<?= base_url('leveladm') ?>" aria-expanded="true"><i style="color: #fff !important"class="ti-stats-up"></i><span><b>Level</b></span></a>
                            </li> -->
                            <!-- <li>
                                <a style="color: #fff !important" href="<?= base_url('departemen') ?>" aria-expanded="true"><i style="color: #fff !important"class="ti-stats-up"></i><span><b>Departemen</b></span></a>
                            </li> -->
                            <li>
                                <a style="color: #fff !important"href="<?= base_url('laporanadm') ?>" aria-expanded="true"><i style="color: #fff !important"class="ti-bookmark-alt"><span></i><b>Laporan</b></span><span class="badge badge-danger badge-pill">5</span></a>
                            </li>
                            <!-- <li>
                                <a style="color: #fff !important"href="<?= base_url('approval') ?>" aria-expanded="true"><i style="color: #fff !important"class="ti-pencil-alt"><span></i><b>Approval</b></span></a>
                            </li> -->
                            <!-- <li>
                                <a style="color: #fff !important" href="<?= base_url('settingadm') ?>" aria-expanded="true"><i style="color: #fff !important" class="ti-settings"></i><span><b>Setting</b></span></a>
                            </li>  -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->