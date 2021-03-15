            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Halaman Pegawai
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Pegawai</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content container-fluid">
                    <div class="col-md-10">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Data Pegawai</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="pegawai" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NIP</th>
                                            <th>NAMA PEGAWAI</th>
                                            <th>JABATAN</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            foreach ($semua_pegawai as $pegawai) {
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $pegawai->nip; ?></td>
                                                <td><?php echo $pegawai->nama_pegawai; ?></td>
                                                <td>
                                                    <?php echo get_jabatan($pegawai->id_jabatan); ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary" href="<?php echo base_url('pegawai/ubah/'.$pegawai->id); ?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-danger" onClick="deleteField(<?php echo $pegawai->id; ?>)"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        <?php
                                            $i++;
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
                        <a class="btn btn-primary col-md-12" href="<?php echo base_url('pegawai/tambah'); ?>"><i class="fa fa-plus"></i> Tambah Baru</a>
                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- Default to the left -->
                <strong>Copyright &copy; 2019 <a href="#"><?php echo ambil_pengaturan('nama_website'); ?></a>.</strong> All rights reserved.
            </footer>
        </div>
        <!-- ./wrapper -->
        <?php $this->load->view('dashboard/_parts/js'); ?>
        <!-- REQUIRED JS SCRIPTS -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#pegawai').DataTable({})
            });

            function reinitDataTable() {
                $.ajax({
                    url : baseUrl+'pegawai/ajax_table'
                }).done(function(r) {
                    $('#pegawai').DataTable().destroy();
                    $('#pegawai tbody').html(r);
                    $('#pegawai').DataTable({});
                    cancel();
                }).fail(function() {

                });
            }

            function deleteField(id) {
                var resultConfirm = confirm('Apakah Anda yakin hapus pegawai ini?');
                if (resultConfirm) {
                    $('#loader').show();
                    $.ajax({
                        url : baseUrl+'pegawai/hapus/'+id,
                        dataType : 'JSON'
                    }).done(function(r) {
                        reinitDataTable();
                        $('#loader').hide();
                        $.notify(r.msg, r.cls);
                    }).fail(function() {
                        $('#loader').hide();
                    });
                }
            }
        </script>