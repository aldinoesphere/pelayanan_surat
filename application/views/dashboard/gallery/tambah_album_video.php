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
                    <form role="form" id="form_album" action="<?php echo base_url('gallery/simpan_gallery_video'); ?>">
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
                                                    <input type="text" name="judul" class="form-control" placeholder="Tambah Judul">
                                                </div>
                                                <div class="form-group">
                                                    <label for="deskripsi">Deskripsi</label>
                                                    <textarea id="deskripsi" name="deskripsi" class="form-control"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="cover_album">Album Cover</label>
                                                    <input type="text" name="cover_album" class="form-control" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-primary btn-upload">
                                                        <i class="fa fa-upload"></i>
                                                            Unggah Foto
                                                        <input type="file" name="fileAlbum" id="fileAlbum" style="display: none;">
                                                    </button>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <div class="preview-image">
                                                        
                                                    </div>
                                                </div>
                                                <!-- Custom Video URL -->
                                                <div class="form-group pull-right">
                                                    <a href="javascript:void(0)" class="btn btn-primary add-field"> Video URL <i class="fa fa-plus-circle"></i></a>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-builder">
                                                        <p class="text-center field-default">Tidak ada data Video URL</p>
                                                    </div>
                                                </div>
                                                <!-- /Custom Video URL -->
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
                                $('.preview > .icon-group > .btn-transparen').remove();
                                var value = $('.preview > .icon-group > .btn-danger').attr('dataImage');
                                $('[name=cover_album]').val(value);
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

            function btnAddField() {
                $('.add-field').click(function(){
                    if ($('.field-default')) {
                        $('.field-default').remove();
                    }
                    $('.form-builder').append(
                        '<div class="item-field col-md-12">'
                            +'<div class="col-md-10 col-sm-10 form-group">'
                                +'<label class="control-label">Video URL</label>'
                                +'<input type="text" placeholder="Masukan URL video" class="form-control" name="link_videos[]" required>'
                            +'</div>'
                            +'<div class="col-md-2">'
                                +'<a href="javascript:void(0)" class="btn btn-danger remove-item-field">'
                                    +'<i class="fa fa-minus-circle"></i>'
                                +'</a>'
                            +'</div>'
                        +'</div>'
                    );
                    btnRemoveField();
                });
            }

            function btnRemoveField() {
                var removeGrosir = document.querySelectorAll('.remove-item-field'); 
                [].forEach.call(removeGrosir, function(elm) {
                    $(elm).click(function(){
                        var itemField = $(this).closest('.item-field');
                        $(itemField).remove();
                        if ($('.item-field').length <= 0) {
                            $('.form-builder').html('<p class="text-center field-default">Tidak ada data Video URL</p>');
                        }
                    });
                });
            }

            function init() {
                ajax_form();
                init_btn_upload();
                var editor = CKEDITOR.replace('deskripsi');
                editor.on('change', function(evt) {
                    $('#deskripsi').html(evt.editor.getData());
                });
                btnAddField();
            }

            init();
        </script>