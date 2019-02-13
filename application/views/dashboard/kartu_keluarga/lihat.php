            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Halaman Kartu Keluarga
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active"><?php echo $page_active['value']; ?></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content container-fluid">
                    <div class="col-md-10">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Data Kartu Keluarga</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="kartu_keluarga" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>NO KK</th>
                                            <th>ALAMAT</th>
                                            <th>RT</th>
                                            <th>RW</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($kartu_keluarga as $kk) {
                                        ?>
                                            <tr>
                                                <td><?php echo $kk->no_kk; ?></td>
                                                <td><?php echo $kk->alamat; ?></td>
                                                <td><?php echo $kk->rt; ?></td>
                                                <td><?php echo $kk->rw; ?></td>
                                                <td>
                                                    <a href="#"><i class="fa fa-eye"></i></a> |
                                                    <a href="#"><i class="fa fa-pencil"></i></a> |
                                                    <a href="#"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-primary col-md-12" href="<?php echo base_url('kartu_keluarga/tambah'); ?>"><i class="fa fa-plus"></i> Tambah Baru</a>
                        <br>
                        <br>
                        <a href="" class="btn btn-success col-md-12"><i class="fa fa-arrow-down"></i> Import data</a>
                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- Default to the left -->
                <strong>Copyright &copy; 2019 <a href="#">Desa Tunggul Payung</a>.</strong> All rights reserved.
            </footer>
        </div>
        <!-- ./wrapper -->
        <?php $this->load->view('dashboard/js'); ?>
        <!-- REQUIRED JS SCRIPTS -->
        <script type="text/javascript">
            $(document).load(function() {
                $('#kartu_keluarga').DataTable({
                  'paging'      : true,
                  'lengthChange': false,
                  'searching'   : false,
                  'ordering'    : true,
                  'info'        : true,
                  'autoWidth'   : false
                })
            });
        </script>