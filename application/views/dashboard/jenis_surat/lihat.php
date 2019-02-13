            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Halaman <?php echo $page_active['value']; ?>
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
                                <h3 class="box-title">Data <?php echo $page_active['value']; ?></h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="jenis_surat" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>KODE SURAT</th>
                                            <th>NAMA SURAT</th>
                                            <th>PRIHAL</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($jenis_surat as $surat) {
                                        ?>
                                            <tr>
                                                <td><?php echo $surat->id; ?></td>
                                                <td><?php echo $surat->kode_surat; ?></td>
                                                <td><?php echo $surat->nama_surat; ?></td>
                                                <td><?php echo $surat->prihal; ?></td>
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
                        <a class="btn btn-primary col-md-12" href="<?php echo base_url('jenis_surat/tambah'); ?>"><i class="fa fa-plus"></i> Tambah Baru</a>
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
                $('#jenis_surat').DataTable({
                  'paging'      : true,
                  'lengthChange': false,
                  'searching'   : false,
                  'ordering'    : true,
                  'info'        : true,
                  'autoWidth'   : false
                })
            });
        </script>