<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Selamat Datang, </p>
                <p>Aldino Said</p>
                <!-- Status -->
                <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
            </div>
        </div>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-home"></i> <span>Beranda</span>
                </a>
            </li>
            <li <?php echo $this->uri->segment(1) == 'kartu_keluarga' ? 'class="active"' : ''; ?>>
                <a href="<?php echo base_url('kartu_keluarga'); ?>">
                    <i class="fa fa-user"></i> Kartu Keluarga
                </a>
            </li>
            <li <?php echo $this->uri->segment(1) == 'kependudukan' ? 'class="active"' : ''; ?>>
                <a href="<?php echo base_url('penduduk'); ?>">
                    <i class="fa fa-group"></i> Kependudukan
                </a>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-cubes"></i> <span>Master data</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php echo $this->uri->segment(1) == 'agama' ? 'class="active"' : ''; ?>>
                        <a href="<?php echo base_url('agama'); ?>">
                            Agama
                        </a>
                    </li>
                    <li <?php echo $this->uri->segment(1) == 'hubungan' ? 'class="active"' : ''; ?>>
                        <a href="<?php echo base_url('hubungan'); ?>">
                            Hubungan
                        </a>
                    </li>
                    <li <?php echo $this->uri->segment(1) == 'pekerjaan' ? 'class="active"' : ''; ?>>
                        <a href="<?php echo base_url('pekerjaan'); ?>">
                            <span>Pekerjaan</span>
                        </a> 
                    </li>
                    <li <?php echo $this->uri->segment(1) == 'pendidikan' ? 'class="active"' : ''; ?>>
                        <a href="<?php echo base_url('pendidikan'); ?>">
                            Pendidikan
                        </a>
                    </li>
                    <li <?php echo $this->uri->segment(1) == 'status_kawin' ? 'class="active"' : ''; ?>>
                        <a href="<?php echo base_url('status_kawin'); ?>">
                            Status Kawin
                        </a>
                    </li>
                    <li <?php echo $this->uri->segment(1) == 'status_tinggal' ? 'class="active"' : ''; ?>>
                        <a href="<?php echo base_url('status_tinggal'); ?>">
                            Status Tinggal
                        </a>
                    </li>
                    <li <?php echo $this->uri->segment(1) == 'jenis_surat' ? 'class="active"' : ''; ?>>
                        <a href="<?php echo base_url('jenis_surat'); ?>">
                            <span>Surat</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="header">PELAYANAN</li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>