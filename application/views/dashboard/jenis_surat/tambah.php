            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Tambah Jenis Surat
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Jenis Surat</li>
                        <li class="active">Tambah</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content container-fluid">
                    <div class="col-md-6">
                        <div class="box">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Masukan Data Jenis Surat</h3>
                                    <div class="pull-right box-tools">
                                        <a class="btn btn-primary" href="<?php echo base_url('jenis_surat'); ?>"><i class="fa fa-arrow-left"></i></a>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" id="form_kk" action="<?php echo base_url('jenis_surat/simpan_surat'); ?>">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="kode_surat">KODE SURAT</label>
                                            <input type="text" class="form-control" id="kode_surat" name="kode_surat" placeholder="MASUKAN KODE SURAT" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_surat">NAMA SURAT</label>
                                            <input type="text" class="form-control" id="nama_surat" name="nama_surat" placeholder="NAMA SURAT" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="prihal">PRIHAL</label>
                                            <input type="text" class="form-control" id="prihal" name="prihal" placeholder="PRIHAL" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="informasi">INFORMASI</label>
                                            <textarea id="informasi" name="informasi" rows="10" cols="80">
                                                
                                            </textarea>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <input type="submit" class="btn btn-primary" value="SIMPAN">
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
        <?php $this->load->view('dashboard/_parts/js'); ?>
        <script src="<?php echo base_url(); ?>assets/bower_components/ckeditor/ckeditor.js"></script>
        <!-- REQUIRED JS SCRIPTS -->
        <script type="text/javascript">
            function ajax_form() {
                $('#form_kk').on('submit', function(e) {
                    e.preventDefault();
                    $('.form-loading').show();
                    data = $(this).serialize();
                    $.ajax({
                        url : $(this).attr('action'),
                        dataType : 'JSON',
                        type : "POST",
                        data : data
                    }).done(function(r) {
                        $('.form-loading').hide();
                        if (r.cls == 'success') {
                            alert(r.msg);
                        } else {
                            alert(r.msg);
                        }
                    }).fail(function() {
                        $('.form-loading').hide();
                    });
                });
            }

            function init() {
                ajax_form();
                CKEDITOR.replace('informasi');
            }

            init();
        </script>
