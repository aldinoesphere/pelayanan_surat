            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Tambah Album
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active"><a href="<?php echo base_url('gallery'); ?>">Album Foto</a></li>
                        <li class="active">Album Baru</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content container-fluid">
                    <!-- form start -->
                    <?php foreach ($galleries as $gallery) : ?>
                    <form role="form" id="form_album" action="<?php echo base_url('gallery/update_album_foto/'.$gallery->id); ?>">
                        <!-- /.callout -->
                        <div class="row">
                            <div class="col-md-10">
                                <div class="box">
                                    <!-- general form elements -->
                                    <div class="box box-primary">
                                        <div class="box-header">
                                            <h3 class="box-title">Masukan Album Baru</h3>
                                        </div>
                                        <!-- /.box-header -->
                                            <div class="box-body">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="judul">JUDUL</label>
                                                        <input type="text" name="judul" class="form-control" placeholder="Tambah Judul" value="<?php echo $gallery->judul; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="deskripsi">Deskripsi</label>
                                                        <textarea id="deskripsi" name="deskripsi" class="form-control">
                                                            <?php echo $gallery->judul; ?>
                                                        </textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cover_album">Album Cover</label>
                                                        <input type="text" name="cover_album" class="form-control" value="<?php echo $gallery->cover_album; ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="button" class="btn btn-primary btn-upload">
                                                            <i class="fa fa-upload"></i>
                                                                Unggah Foto
                                                            <input type="file" name="fileAlbum" id="fileAlbum" multiple="" style="display: none;">
                                                        </button>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="preview-image">
                                                        <?php
                                                            $links = unserialize($gallery->links_url);
                                                            if ($links) :
                                                                foreach ($links as $file) :
                                                                    if (file_exists(get_link_foto($file))) :
                                                        ?>
                                                            <div class="preview">
                                                                <div class="icon-group">
                                                                    <a href="javascript:void(0);" class="btn btn-danger remove" dataimage="<?php echo $file; ?>"><i class="fa fa-remove"></i></a>
                                                                    <a href="javascript:void(0);" class="btn <?php if ($gallery->cover_album == $file) { echo 'btn-success'; } else { echo 'btn-transparen'; } ?> check" dataimage="<?php echo $file; ?>"><i class="fa fa-check"></i></a>
                                                                </div>
                                                                <input type="hidden" name="link_foto[]" value="<?php echo $file; ?>">
                                                                <img src="<?php echo base_url(get_link_foto($file)); ?>">
                                                            </div>
                                                        <?php
                                                                    endif;
                                                                endforeach;
                                                            endif;
                                                        ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
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
                $('#form_album').on('submit', function(e) {
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
                $("#form_album")[0].reset();
            }

            function init_btn_upload() {
                $('.btn-upload').click(function(){
                    var fileAlbum = document.getElementById('fileAlbum');
                    fileAlbum.click();
                });

                $('[name=fileAlbum]').on('change', function(){
                    uploadAlbum(this);
                });
            }

            function uploadAlbum(input){
                $.each(input.files, function (k, v){
                    if (input.files[k]) {
                        var reader = new FileReader();
                        var formData = new FormData();
                        reader.onload = function (e) {
                            formData.append("image_data", e.target.result); 
                            $.ajax({
                                url: baseUrl+"gallery/upload_foto",
                                type: "POST",
                                data: formData,
                                dataType: "json",
                                contentType: false,
                                processData: false
                            }).done(function(data){
                                $(".preview-image").append(data);
                                setCoverAlbum();
                                deleteImageAlbum();
                            }).fail(function(){

                            });
                        }
                        reader.readAsDataURL(input.files[k]);
                    }
                });
            }

            function deleteImageAlbum(){
                $('.remove').on('click', function(e){
                    e.preventDefault();
                    var element = this.parentNode.parentNode;
                    var data = {
                        'file_name' : this.getAttribute('dataImage')
                    };
                    $.ajax({
                        url: baseUrl+"gallery/hapus_foto",
                        type: "post",
                        data: data,
                        dataType: 'json'
                    }).done(function(r){
                        if (r) {
                            $(element).remove('.preview');
                        }
                    }).fail(function(){

                    });
                });
            }

            function setCoverAlbum() {
                $('.check').click(function(e){
                    e.preventDefault();
                    var value = this.getAttribute('dataImage');
                    $('[name=cover_album]').val(value);
                    $('.check').addClass('btn-transparen');
                    $('.check').removeClass('btn-success');
                    $(this).removeClass('btn-transparen');
                    $(this).addClass('btn-success');
                });
            }

            function init() {
                ajax_form();
                init_btn_upload();
                setCoverAlbum();
                deleteImageAlbum();
                var editor = CKEDITOR.replace('deskripsi');
                editor.on('change', function(evt) {
                    $('#deskripsi').html(evt.editor.getData());
                });
            }

            init();
        </script>