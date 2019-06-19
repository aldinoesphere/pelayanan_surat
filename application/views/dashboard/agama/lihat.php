            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Halaman Master Agama
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Agama</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content container-fluid">
                    <!-- callout -->
                    <div class="callout callout-info">
                        <h4>PENTING !</h4>
                        <p>Data master agama ini perlu diisi sesuai petunjuk pengisian formulir kartu keluarga.</p>
                        <p>Isi kode agama dan nama agama harus sesuai dengan petunjuk pengisian formulir dari Pemerintah.</p>
                    </div>
                    <!-- /.callout -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box">
                                <!-- general form elements -->
                                <div class="box box-primary">
                                    <div class="box-header">
                                        <h3 class="box-title">Form Input Agama</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <!-- form start -->
                                    <form role="form" id="form_agama" action="<?php echo base_url('agama/simpan'); ?>">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="kode_agama">KODE AGAMA</label>
                                                <input type="number" class="form-control" id="kode_agama" name="kode_agama" placeholder="MASUKAN KODE AGAMA" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_agama">NAMA AGAMA</label>
                                                <input type="text" class="form-control" id="nama_agama" name="nama_agama" placeholder="MASUKAN NAMA AGAMA" required>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <input type="submit" class="btn btn-primary" value="SIMPAN">
                                            <button type="button" class="btn btn-warning" onclick="cancel();">BATAL</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.box -->
                                <!-- Loading (remove the following to stop the loading)-->
                                <div class="overlay form-loading" style="display: none;">
                                    <i class="fa fa-refresh fa-spin"></i>
                                </div>
                                <!-- end loading -->
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Daftar Agama</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="agama" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>KODE AGAMA</th>
                                                <th>NAMA AGAMA</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 1;
                                                foreach ($agama as $value) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $value->kode_agama; ?></td>
                                                    <td><?php echo $value->nama_agama; ?></td>
                                                    <td>
                                                        <a class="btn btn-primary" href="javascript:void(0)" onClick="editField(<?php echo $value->id; ?>)">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a class="btn btn-danger" href="javascript:void(0)" onClick="deleteField(<?php echo $value->id; ?>)">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
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
                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- Default to the left -->
                <strong>Copyright &copy; 2019 <a href="#">Desa ....</a>.</strong> All rights reserved.
            </footer>
        </div>
        <!-- ./wrapper -->
        <?php $this->load->view('dashboard/_parts/js'); ?>
        <!-- REQUIRED JS SCRIPTS -->
        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#agama').DataTable({});
            });

            function ajax_form() {
                $('#form_agama').on('submit', function(e) {
                    e.preventDefault();
                    var form = this;
                    $('.form-loading').show();
                    data = $(this).serialize();
                    $.ajax({
                        url : $(this).attr('action'),
                        dataType : 'JSON',
                        type : "POST",
                        data : data
                    }).done(function(r) {
                        reinitDataTable();
                        $('.form-loading').hide();
                        $.notify(r.msg, r.cls);
                    }).fail(function() {
                        $('.form-loading').hide();
                    });
                });
            }

            function reinitDataTable() {
                $.ajax({
                    url : baseUrl+'agama/ajax_table'
                }).done(function(r) {
                    $('#agama').DataTable().destroy();
                    $('#agama tbody').html(r);
                    $('#agama').DataTable({});
                    cancel();
                }).fail(function() {

                });
            }

            function cancel() {
                $("#form_agama")[0].reset();
                $("#form_agama").attr("action", baseUrl+'agama/simpan');
            }

            function deleteField(id) {
                var resultConfirm = confirm('Apakah Anda yakin hapus agama ini?');
                if (resultConfirm) {
                    $('#loader').show();
                    $.ajax({
                        url : baseUrl+'agama/hapus/'+id,
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

            function editField(id) {
                $.ajax({
                    url : baseUrl+'agama/cari/'+id,
                    dataType: "JSON"
                }).done(function(r){
                    $("#form_agama").attr("action", baseUrl+'agama/ubah/'+r.id);
                    $("#kode_agama").val(r.kode_agama);
                    $("#nama_agama").val(r.nama_agama);
                });
            }

            function init() {
                ajax_form();
            }

            init();
        </script>