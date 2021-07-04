            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Halaman Permohonan Surat
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Permohonan Surat</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content container-fluid">
                    <div class="col-md-10">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Data Permohonan Surat</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="pelayanan_surat" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>KODE SURAT</th>
                                            <th>NO SURAT</th>
                                            <th>NIK PEMOHON</th>
                                            <th>TANGGAL PERMOHONAN</th>
                                            <th>STATUS</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            foreach ($data_permohonan as $permohonan) {
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $permohonan->kode_surat; ?></td>
                                                <td><?php echo $permohonan->nomor_surat; ?></td>
                                                <td><?php echo $permohonan->nik; ?></td>
                                                <td><?php echo $permohonan->tanggal_buat; ?></td>
                                                <td>
                                                    <?php echo $permohonan->status; ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-info" href="<?php echo base_url('pelayanan_surat/tampilan_detail/'.$permohonan->id); ?>">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a class="btn btn-primary" href="<?php echo base_url('pelayanan_surat/ubah/'.$permohonan->id); ?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-danger" onClick="deleteField(<?php echo $permohonan->id; ?>)"><i class="fa fa-trash"></i></button>
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
                        <a class="btn btn-primary col-md-12" href="<?php echo base_url('pelayanan_surat/tambah'); ?>"><i class="fa fa-plus"></i> Tambah Baru</a>
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
                $('#pelayanan_surat').DataTable({})
            });

            function reinitDataTable() {
                $.ajax({
                    url : baseUrl+'pelayanan_surat/ajax_table'
                }).done(function(r) {
                    $('#pelayanan_surat').DataTable().destroy();
                    $('#pelayanan_surat tbody').html(r);
                    $('#pelayanan_surat').DataTable({});
                    cancel();
                }).fail(function() {

                });
            }

            function deleteField(id) {
                var resultConfirm = confirm('Apakah Anda yakin hapus jenis surat ini?');
                if (resultConfirm) {
                    $('#loader').show();
                    $.ajax({
                        url : baseUrl+'pelayanan_surat/hapus/'+id,
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