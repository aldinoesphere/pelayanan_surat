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
            <li class="header">Master Data</li>
            <li class="treeview
                <?php
                    $sub_pages = [
                        'kartu_keluarga'
                    ];

                    if (isset($page_active)) {
                        if (in_array($page_active['key'], $sub_pages)) {
                            echo 'active';
                        }
                    }
                ?>
            ">
                <a href="#"><i class="fa fa-link"></i> <span>Keluarga</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li
                        <?php
                            if (isset($page_active)) {
                                if ($page_active['key'] == 'kartu_keluarga') {
                                    echo 'class="active"';
                                }
                            }
                        ?>
                    ><a href="<?php echo base_url('kartu_keluarga'); ?>">Kartu Keluarga</a></li>
                </ul>
            </li>
            <li 
                <?php
                    if (isset($page_active)) {
                        if ($page_active['key'] === 'jenis_surat') {
                            echo 'class="active"';
                        }
                    } 
                ?>
            >
                <a href="<?php echo base_url('jenis_surat'); ?>"><i class="fa fa-envelope-o"></i>
                    <span>Jenis Surat</span>
                </a>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>