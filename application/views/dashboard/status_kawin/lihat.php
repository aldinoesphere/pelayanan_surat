            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Halaman Master Status Perkawinan
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Status Perkawinan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content container-fluid">
                    <!-- callout -->
                    <div class="callout callout-info">
                        <h4>PENTING !</h4>
                        <p>Data master status kawin ini perlu diisi sesuai petunjuk pengisian formulir kartu keluarga.</p>
                        <p>Isi kode status kawin dan nama status kawin harus sesuai dengan petunjuk pengisian formulir dari Pemerintah.</p>
                    </div>
                    <!-- /.callout -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box">
                                <!-- general form elements -->
                                <div class="box box-primary">
                                    <div class="box-header">
                                        <h3 class="box-title">Form Input Status Perkawinan</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <!-- form start -->
                                    <form role="form" id="form_status_kawin" action="<?php echo base_url('status_kawin/simpan'); ?>">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="kode_status_kawin">KODE STATUS KAWIN</label>
                                                <input type="number" class="form-control" id="kode_status_kawin" name="kode_status_kawin" placeholder="MASUKAN KODE STATUS KAWIN" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_status_kawin">NAMA STATUS KAWIN</label>
                                                <input type="text" class="form-control" id="nama_status_kawin" name="nama_status_kawin" placeholder="MASUKAN NAMA STATUS KAWIN" required>
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
                                    <h3 class="box-title">Daftar Status Perkawinan</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="status_kawin" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>KODE STATUS KAWIN</th>
                                                <th>NAMA STATUS KAWIN</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 1;
                                                foreach ($status_kawin as $value) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $value->kode_status_kawin; ?></td>
                                                    <td><?php echo $value->nama_status_kawin; ?></td>
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
                var table = $('#status_kawin').DataTable({});
            });

            function ajax_form() {
                $('#form_status_kawin').on('submit', function(e) {
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
                    url : baseUrl+'status_kawin/ajax_table'
                }).done(function(r) {
                    $('#status_kawin').DataTable().destroy();
                    $('#status_kawin tbody').html(r);
                    $('#status_kawin').DataTable({});
                    cancel();
                }).fail(function() {

                });
            }

            function cancel() {
                $("#form_status_kawin")[0].reset();
                $("#form_status_kawin").attr("action", baseUrl+'status_kawin/simpan');
            }

            function deleteField(id) {
                var resultConfirm = confirm('Apakah Anda yakin hapus status kawin ini?');
                if (resultConfirm) {
                    $('#loader').show();
                    $.ajax({
                        url : baseUrl+'status_kawin/hapus/'+id,
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
                    url : baseUrl+'status_kawin/cari/'+id,
                    dataType: "JSON"
                }).done(function(r){
                    $("#form_status_kawin").attr("action", baseUrl+'status_kawin/ubah/'+r.id);
                    $("#kode_status_kawin").val(r.kode_status_kawin);
                    $("#nama_status_kawin").val(r.nama_status_kawin);
                });
            }

            function init() {
                ajax_form();
            }

            init();
        </script>