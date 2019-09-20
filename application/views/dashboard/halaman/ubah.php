            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Ubah Halaman
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active"><a href="<?php echo base_url('halaman'); ?>">Halaman</a></li>
                        <li class="active">Ubah Halaman</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content container-fluid">
                    <?php foreach ($halaman as $value) : ?>
                        <!-- form start -->
                        <form role="form" id="form_halaman" action="<?php echo base_url('halaman/ubah_halaman/'.$value->id); ?>">
                            <!-- /.callout -->
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="box">
                                        <!-- general form elements -->
                                        <div class="box box-primary">
                                            <div class="box-header">
                                                <h3 class="box-title">Masukan Perubahan Halaman</h3>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="judul">JUDUL</label>
                                                        <input type="text" name="judul" class="form-control" placeholder="Tambah Judul" value="<?php echo $value->judul; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="konten">KONTEN</label>
                                                        <textarea id="konten" name="konten" class="form-control">
                                                            <?php echo $value->konten; ?>
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
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select name="status" class="form-control auto_select" value="<?php echo $value->status; ?>">
                                                    <option value="0">Draft</option>
                                                    <option value="1">Publish</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="gambar">Unggah Gambar</label>
                                                <button class="btn btn-default btn-block btn-upload" type="button">Unggah Gambar</button>
                                                <input type="file" name="thumbnail" id="thumbnail" class="hidden">
                                                <input type="text" name="post_thumbnail" class="hidden">
                                            </div>
                                            <div class="form-group display-image">
                                                <?php if ($value->post_thumbnail) : ?>
                                                    <img src="<?php echo base_url('uploads/images/post/original/'.$value->post_thumbnail); ?>">
                                                <?php else : ?>
                                                    <img src="<?php echo base_url('assets/dist/img/avatar.png'); ?>">
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="induk">Halaman Induk</label>
                                                <select name="induk" class="form-control auto_select" value="<?php echo $value->induk; ?>">
                                                    <option value="">- Tidak ada induk -</option>
                                                    <?php foreach ($halaman_induk as $induk): ?>
                                                        <option value="<?php echo $induk->id ?>"><?php echo $induk->judul; ?></option>
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
                    <?php endforeach; ?>
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
            $(document).ready(function() {
                $('#tgl_lahir').datepicker({
                  autoclose: true
                });

                $(".select2").select2();
            });

            function ajax_form() {
                $('#form_halaman').on('submit', function(e) {
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
                $("#form_halaman")[0].reset();
            }

            function init_btn_upload() {
                $('.btn-upload').click(function(){
                    var postThumbnailUpload = document.getElementById('thumbnail');
                    postThumbnailUpload.click();
                });

                $('#thumbnail').on('change', function(){
                    uploadThumbnail(this);
                });
            }

            function uploadThumbnail(input){
                if (input.files[0]) {
                    var reader = new FileReader();
                    var formData = new FormData();
                    reader.onload = function (e) {
                        var data = {
                            'imageThumb' : e.target.result
                        }
                        $.ajax({
                            url         : baseUrl+'artikel/upload_image',
                            type        : "POST",
                            dataType: "json",
                            data        : data
                        }).done(function(r){
                            if (r.status) {
                                var displayImage = '<img src="'+r.value+'">';
                                $('.display-image').html(displayImage);
                                $('[name=post_thumbnail]').val(r.fileName);
                            } else {
                                $.notify(r.msg, r.cls);
                            }
                        }).fail(function(error){

                        }); 
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            function init() {
                ajax_form();
                init_btn_upload();
                var editor = CKEDITOR.replace('konten');
                editor.on('change', function(evt) {
                    $('#konten').html(evt.editor.getData());
                });
                $.each($(".auto_select"), function(i, elm){
                    var itemValue = $(this).attr('value');
                    if ($(this).hasClass('select2')) {
                        $(this).val(itemValue);
                        $(this).trigger('change');
                    } else {
                        $(this).find('option[value='+itemValue+']').attr('selected', true);
                    }
                });
            }

            init();
        </script>