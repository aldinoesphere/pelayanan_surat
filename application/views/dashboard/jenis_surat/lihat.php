            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Halaman Jenis Surat
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Jenis Surat</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content container-fluid">
                    <div class="col-md-10">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Data Jenis Surat</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="jenis_surat" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>KODE SURAT</th>
                                            <th>NAMA SURAT</th>
                                            <th>FILE TEMPLATE</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            foreach ($jenis_surat as $surat) {
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $surat->kode_surat; ?></td>
                                                <td><?php echo $surat->nama_surat; ?></td>
                                                <td>
                                                    <?php
                                                        if (!$surat->file_template) {
                                                            echo "-";
                                                        } else {
                                                            echo $surat->file_template;
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary" href="<?php echo base_url('jenis_surat/ubah/'.$surat->id); ?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-danger" onClick="deleteField(<?php echo $surat->id; ?>)"><i class="fa fa-trash"></i></button>
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
                        <a class="btn btn-primary col-md-12" href="<?php echo base_url('jenis_surat/tambah'); ?>"><i class="fa fa-plus"></i> Tambah Baru</a>
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
                $('#jenis_surat').DataTable({})
            });

            function reinitDataTable() {
                $.ajax({
                    url : baseUrl+'jenis_surat/ajax_table'
                }).done(function(r) {
                    $('#jenis_surat').DataTable().destroy();
                    $('#jenis_surat tbody').html(r);
                    $('#jenis_surat').DataTable({});
                    cancel();
                }).fail(function() {

                });
            }

            function deleteField(id) {
                var resultConfirm = confirm('Apakah Anda yakin hapus jenis surat ini?');
                if (resultConfirm) {
                    $('#loader').show();
                    $.ajax({
                        url : baseUrl+'jenis_surat/hapus/'+id,
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