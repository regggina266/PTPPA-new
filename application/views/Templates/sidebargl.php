        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <img src="<?= base_url();?>assets/images/ptppa.png" width="50px" height="50px" alt="ppa"
            class="brand-image img-circle elevation-1" style="opacity: .9">
                   <span><font color="white">PT PPA</font></span>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                     <div style="background: #000 !important" class="user-profile pull-center d-flex">
                              <img class="avatar user-thumb" src="assets/images/author/orang.png" class="img-circle elevation-2" alt="orang">
                            <div class="info">
                                <a href="#" class="text-white" class="d-block"><?=$this->session->userdata('nama');?></a>
                            </div>
                        </div>
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="<?= base_url('dashboardgl') ?>" aria-expanded="true"><i class="ti-home"></i><span><b>Dashboard</b></span></a>
                            </li>
                            <li>
                                <a style="color: #fff !important" href="<?= base_url('akungl') ?>" aria-expanded="true"><i style="color: #fff !important" class="ti-user"></i><span><b>Akun</b></span></a>
                            </li>
                            <li>
                                <a style="color: #fff !important" href="<?= base_url('levelgl') ?>" aria-expanded="true"><i style="color: #fff !important"class="ti-stats-up"></i><span><b>Level</b></span></a>
                            </li>
                            <li>
                                <a style="color: #fff !important"href="<?= base_url('laporangl') ?>" aria-expanded="true"><i style="color: #fff !important"class="ti-bookmark-alt"><span></i><b>Laporan</b></span><span class="badge badge-danger badge-pill">5</span></a>
                            </li>
                            <li>
                                <a style="color: #fff !important" href="<?= base_url('settinggl') ?>" aria-expanded="true"><i style="color: #fff !important" class="ti-settings"></i><span><b>Setting</b></span></a>
                            </li>
                            <li>
                                <a style="color: #fff !important" href="<?= base_url('logout') ?>" aria-expanded="true"><i style="color: #fff !important" class="ti-close"></i><span><b>Logout</b></span></a>
                            </li>
                            </li> 
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->