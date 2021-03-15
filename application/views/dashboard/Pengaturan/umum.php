            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Pengaturan
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active"><a href="<?php echo base_url('pengaturan'); ?>">Pengaturan</a></li>
                        <li class="active">Umum</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content container-fluid">
                    <!-- form start -->
                    <form role="form" id="form_pengaturan" action="<?php echo base_url('pengaturan/simpan_pengaturan'); ?>" method="POST">
                        <!-- /.callout -->
                        <div class="row">
                            <div class="col-md-10">
                                <div class="box">
                                    <!-- general form elements -->
                                    <div class="box box-primary">
                                        <div class="box-header">
                                            <h3 class="box-title">Umum</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="no_tlp">Nomor Telp</label>
                                                    <input type="text" name="no_tlp" class="form-control" placeholder="+62xxxxxx" value="<?php echo ambil_pengaturan('no_tlp'); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama website">Nama Website</label>
                                                    <input type="text" name="nama_website" class="form-control" placeholder="Nama Website" value="<?php echo ambil_pengaturan('nama_website'); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="instagram">Instagram</label>
                                                    <input type="text" name="instagram" class="form-control" placeholder="Instagram" value="<?php echo ambil_pengaturan('instagram'); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="facebook">Facebook</label>
                                                    <input type="text" name="facebook" class="form-control" placeholder="Facebook" value="<?php echo ambil_pengaturan('facebook'); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email_admin">Email Admin</label>
                                                    <input type="text" name="email_admin" class="form-control" placeholder="Email Admin" value="<?php echo ambil_pengaturan('email_admin'); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="twitter">Twitter</label>
                                                    <input type="text" name="twitter" class="form-control" placeholder="Twitter" value="<?php echo ambil_pengaturan('twitter'); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="alamat">Alamat</label>
                                                    <textarea id="alamat" name="alamat" class="form-control">
                                                        <?php echo ambil_pengaturan('alamat'); ?>
                                                    </textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="profil_desa">Profil pembentukan Desa</label>
                                                    <textarea id="profil_desa" name="profil_desa" class="form-control">
                                                        <?php echo ambil_pengaturan('profil_desa'); ?>
                                                    </textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="profil_lembaga">Profil Lembaga Desa</label>
                                                    <textarea id="profil_lembaga" name="profil_lembaga" class="form-control">
                                                        <?php echo ambil_pengaturan('profil_lembaga'); ?>
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
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
                            <div class="col-md-2">
                                <div class="box box-primary">
                                    <div class="box box-footer">
                                        <button class="btn btn-primary btn-block">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
        <script src="<?php echo base_url(); ?>assets/bower_components/ckeditor/ckeditor.js"></script>
        <!-- REQUIRED JS SCRIPTS -->
        <script type="text/javascript">
            function ajax_form() {
                $('#form_pengaturan').on('submit', function(e) {
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
                        $('.form-loading').hide();
                        $.notify(r.msg, r.cls);
                    }).fail(function() {
                        $('.form-loading').hide();
                    });
                });
            }

            function init() {
                ajax_form();
                var editor = CKEDITOR.replace('alamat');
                editor.on('change', function(evt) {
                    $('#alamat').html(evt.editor.getData());
                });
                var editor = CKEDITOR.replace('profil_desa');
                editor.on('change', function(evt) {
                    $('#profil_desa').html(evt.editor.getData());
                });
                var editor = CKEDITOR.replace('profil_lembaga');
                editor.on('change', function(evt) {
                    $('#profil_lembaga').html(evt.editor.getData());
                });
            }

            init();
        </script>