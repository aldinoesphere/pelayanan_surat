            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Tambah Artikel
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active"><a href="<?php echo base_url('artikel'); ?>">Artikel</a></li>
                        <li class="active">Artikel Baru</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content container-fluid">
                    <!-- form start -->
                    <form role="form" id="form_artikel" action="<?php echo base_url('artikel/simpan_artikel'); ?>">
                        <!-- /.callout -->
                        <div class="row">
                            <div class="col-md-10">
                                <div class="box">
                                    <!-- general form elements -->
                                    <div class="box box-primary">
                                        <div class="box-header">
                                            <h3 class="box-title">Masukan Artikel Baru</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="judul">Judul</label>
                                                    <input type="text" name="judul" class="form-control" placeholder="Tambah Judul">
                                                </div>
                                                <div class="form-group">
                                                    <label for="konten">Konten</label>
                                                    <textarea id="konten" name="konten" class="form-control"></textarea>
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
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" class="form-control">
                                                <option value="0">Draft</option>
                                                <option value="1">Publish</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="gambar">Unggah Gambar</label>
                                            <button class="btn btn-default btn-block" type="button">Unggah Gambar</button>
                                            <input type="file" name="thumbnail" class="hidden">
                                            <input type="hidden" name="post_thumbnail">
                                        </div>
                                        <div class="form-group">
                                            <label for="kategori">Artikel Kategori</label>
                                            <select name="kategori" class="form-control">
                                                <option value="">- Tidak ada kategori -</option>
                                                <?php foreach ($artikel_kategori as $kategori): ?>
                                                    <option value="<?php echo $kategori->id ?>"><?php echo $kategori->nama_kategori; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
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
                <strong>Copyright &copy; 2019 <a href="#">Desa ....</a>.</strong> All rights reserved.
            </footer>
        </div>
        <!-- ./wrapper -->
        <?php $this->load->view('dashboard/_parts/js'); ?>
        <script src="<?php echo base_url(); ?>assets/bower_components/ckeditor/ckeditor.js"></script>
        <!-- REQUIRED JS SCRIPTS -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#tgl_lahir').datepicker({
                  autoclose: true
                });

                $(".select2").select2();
            });

            function ajax_form() {
                $('#form_artikel').on('submit', function(e) {
                    e.preventDefault();
                    var form = this;
                    $('#loader').show();
                    data = $(this).serialize();
                    $.ajax({
                        url : $(this).attr('action'),
                        dataType : 'JSON',
                        type : "POST",
                        data : data
                    }).done(function(r) {
                        $('#loader').hide();
                        $.notify(r.msg, r.cls);
                    }).fail(function() {
                        $('#loader').hide();
                    });
                });
            }

            function create_new() {
                $("#form_artikel")[0].reset();
            }

            function init() {
                ajax_form();
                var editor = CKEDITOR.replace('konten');
                editor.on('change', function(evt) {
                    $('#konten').html(evt.editor.getData());
                });
            }

            init();
        </script>