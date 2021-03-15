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
            <li class="header">PELAYANAN MASYAKARAT</li>
            <li <?php echo $this->uri->segment(1) == 'surat' ? 'class="active"' : ''; ?>>
                <a href="<?php echo base_url('surat'); ?>">
                    <i class="fa fa-envelope"></i> PERMOHONAN SURAT
                </a>
            </li>
            <li class="header">BLOG</li>
            <li class="treeview">
                <a href="#"><i class="fa  fa-file-text-o"></i> <span>Halaman</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php echo $this->uri->segment(1) == 'halaman' && $this->uri->segment(2) == 'daftar' ? 'class="active"' : ''; ?>>
                        <a href="<?php echo base_url('halaman/daftar'); ?>">
                            Daftar Halaman
                        </a>
                    </li>
                    <li <?php echo $this->uri->segment(1) == 'halaman' && $this->uri->segment(2) == 'tambah' ? 'class="active"' : ''; ?>>
                        <a href="<?php echo base_url('halaman/tambah'); ?>">
                            Tambah Halaman
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-bullhorn"></i> <span>Artikel</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php echo $this->uri->segment(1) == 'artikel' && $this->uri->segment(2) == 'daftar' ? 'class="active"' : ''; ?>>
                        <a href="<?php echo base_url('artikel/daftar'); ?>">
                            Daftar Artikel
                        </a>
                    </li>
                    <li <?php echo $this->uri->segment(1) == 'artikel' && $this->uri->segment(2) == 'menu_kategori' ? 'class="active"' : ''; ?>>
                        <a href="<?php echo base_url('artikel/menu_kategori'); ?>">
                            Kategori Artikel
                        </a>
                    </li>
                    <li <?php echo $this->uri->segment(1) == 'artikel' && $this->uri->segment(2) == 'tambah' ? 'class="active"' : ''; ?>>
                        <a href="<?php echo base_url('artikel/tambah'); ?>">
                            Tambah Artikel
                        </a>
                    </li>
                </ul>
            </li>
            <li class="header">GALLERY</li>
            <li <?php echo $this->uri->segment(1) == 'foto' ? 'class="active"' : ''; ?>>
                <a href="<?php echo base_url('foto'); ?>">
                    <i class="fa fa-image"></i> FOTO
                </a>
            </li>
            <li <?php echo $this->uri->segment(1) == 'video' ? 'class="active"' : ''; ?>>
                <a href="<?php echo base_url('video'); ?>">
                    <i class="fa fa-film"></i> VIDEO
                </a>
            </li>
            <li class="header"></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-gear"></i> <span>Pengaturan</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php echo $this->uri->segment(1) == 'pengaturan' && $this->uri->segment(2) == 'umum' ? 'class="active"' : ''; ?>>
                        <a href="<?php echo base_url('pengaturan/umum'); ?>">
                            Umum
                        </a>
                    </li>
                    <li <?php echo $this->uri->segment(1) == 'pengaturan' && $this->uri->segment(2) == 'banner' ? 'class="active"' : ''; ?>>
                        <a href="<?php echo base_url('pengaturan/banner'); ?>">
                            Banner
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>