            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Halaman Input Anggota Keluarga
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Pendidikan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content container-fluid">
                    <!-- callout -->
                    <div class="callout callout-info">
                        <h4>PENTING !</h4>
                        <p>Data master pendidikan ini perlu diisi sesuai petunjuk pengisian formulir kartu keluarga.</p>
                        <p>Isi kode pendidikan dan nama pendidikan harus sesuai dengan petunjuk pengisian formulir dari Pemerintah.</p>
                    </div>
                    <!-- /.callout -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box">
                                <!-- general form elements -->
                                <div class="box box-primary">
                                    <div class="box-header">
                                        <h3 class="box-title">Form Input Anggota Keluarga</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <!-- form start -->
                                    <form role="form" id="form_pendidikan" action="<?php echo base_url('pendidikan/simpan'); ?>">
                                        <div class="box-body">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="no_kk">NO KK</label>
                                                    <input type="number" class="form-control" id="no_kk" name="no_kk" value="<?php echo $no_kk; ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nik">NIK</label>
                                                    <input type="number" class="form-control" id="nik" name="nik" placeholder="MASUKAN NOMOR IDENTITAS KEPENDUDUKAN" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama">NAMA LENGKAP</label>
                                                    <input type="number" class="form-control" id="nama" name="nama" placeholder="MASUKAN NAMA LENGKAP PENDUDUK" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6"></div>
                                            <div class="form-group">
                                                <label for="nama_pendidikan">NAMA PENDIDIKAN</label>
                                                <input type="text" class="form-control" id="nama_pendidikan" name="nama_pendidikan" placeholder="MASUKAN NAMA PENDIDIKAN" required>
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
                var table = $('#pendidikan').DataTable({});
            });

            function ajax_form() {
                $('#form_pendidikan').on('submit', function(e) {
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
                    url : baseUrl+'pendidikan/ajax_table'
                }).done(function(r) {
                    $('#pendidikan').DataTable().destroy();
                    $('#pendidikan tbody').html(r);
                    $('#pendidikan').DataTable({});
                    cancel();
                }).fail(function() {

                });
            }

            function cancel() {
                $("#form_pendidikan")[0].reset();
                $("#form_pendidikan").attr("action", baseUrl+'pendidikan/simpan');
            }

            function deleteField(id) {
                var resultConfirm = confirm('Apakah Anda yakin hapus pendidikan ini?');
                if (resultConfirm) {
                    $('#loader').show();
                    $.ajax({
                        url : baseUrl+'pendidikan/hapus/'+id,
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
                    url : baseUrl+'pendidikan/cari/'+id,
                    dataType: "JSON"
                }).done(function(r){
                    $("#form_pendidikan").attr("action", baseUrl+'pendidikan/ubah/'+r.id);
                    $("#kode_pendidikan").val(r.kode_pendidikan);
                    $("#nama_pendidikan").val(r.nama_pendidikan);
                });
            }

            function init() {
                ajax_form();
            }

            init();
        </script>