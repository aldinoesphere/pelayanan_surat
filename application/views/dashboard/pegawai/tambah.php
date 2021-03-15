            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Halaman Input Pegawai Baru
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active"><a href="<?php echo base_url('pegawai'); ?>">Pegawai</a></li>
                        <li class="active">Input Pegawai</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content container-fluid">
                    <!-- /.callout -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box">
                                <!-- general form elements -->
                                <div class="box box-primary">
                                    <div class="box-header">
                                        <h3 class="box-title">Form Input Pegawai Baru</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <!-- form start -->
                                    <form role="form" id="form_pegawai" action="<?php echo base_url('pegawai/simpan'); ?>">
                                        <div class="box-body">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nip">NIP</label>
                                                    <input type="text" class="form-control" id="nip" name="nip" placeholder="MASUKAN NOMOR IDENTITAS PEGAWAI" maxlength="20" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama_pegawai">NAMA PEGAWAI</label>
                                                    <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="MASUKAN NAMA PEGAWAI" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jk">JENIS KELAMIN</label>
                                                    <select class="form-control" id="jk" name="jk" required>
                                                        <option value="0">- PILIH JENIS KELAMIN -</option>
                                                        <option value="1">LAKI - LAKI</option>
                                                        <option value="2">PEREMPUAN</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tempat_lahir">TEMPAT LAHIR</label>
                                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="MASUKAN TEMPAT LAHIR PEGAWAI" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tgl_lahir">TANGGAL LAHIR</label>
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="text" class="form-control pull-right" id="tgl_lahir" name="tgl_lahir" placeholder="dd/mm/yyyy" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="jabatan">JABATAN</label>
                                                    <select class="form-control select2" name="id_jabatan" id="jabatan" required>
                                                        <option value="0">- PILIH JABATAN -</option>
                                                        <?php foreach ($semua_jabatan as $jabatan) :?>
                                                            <option value="<?php echo $jabatan['id']; ?>">
                                                                <?php echo $jabatan['jabatan']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="no_tlp">NO TELP</label>
                                                    <input type="text" class="form-control" id="no_tlp" name="no_tlp" placeholder="MASUKAN NO HANDPHONE" required>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-8">
                                                        <div class="display-image">
                                                            <img src="<?php echo base_url('assets/dist/img/avatar.png'); ?>">
                                                        </div>
                                                        <br>
                                                        <input type="file" name="photo" id="photo" style="display: none;">
                                                        <input type="hidden" name="link_photo">
                                                        <button class="btn btn-primary btn-block btn-upload" type="button">
                                                            <i class="fa fa-upload"></i> Unggah Foto
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <input type="submit" class="btn btn-primary" value="SIMPAN">
                                            <button type="button" class="btn btn-warning" onclick="create_new();">ISI BARU</button>
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
                <strong>Copyright &copy; 2019 <a href="#"><?php echo ambil_pengaturan('nama_website'); ?></a>.</strong> All rights reserved.
            </footer>
        </div>
        <!-- ./wrapper -->
        <?php $this->load->view('dashboard/_parts/js'); ?>
        <!-- REQUIRED JS SCRIPTS -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#tgl_lahir').datepicker({
                  autoclose: true
                });

                $(".select2").select2();
            });

            function init_btn_upload() {
                $('.btn-upload').click(function(){
                    var postThumbnailUpload = document.getElementById('photo');
                    postThumbnailUpload.click();
                });

                $('#photo').on('change', function(){
                    uploadThumbnail(this);
                });
            }

            function uploadThumbnail(input){
                if (input.files[0]) {
                    var reader = new FileReader();
                    var formData = new FormData();
                    reader.onload = function (e) {
                        var data = {
                            'photo' : e.target.result
                        }
                        $.ajax({
                            url         : baseUrl+'pegawai/upload_image',
                            type        : "POST",
                            dataType    : "json",
                            data        : data
                        }).done(function(r){
                            if (r.status) {
                                var displayImage = '<img src="'+r.value+'">';
                                $('.display-image').html(displayImage);
                                $('[name=link_photo]').val(r.fileName);
                            } else {
                                $.notify(r.msg, r.cls);
                            }
                        }).fail(function(error){

                        }); 
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            function ajax_form() {
                $('#form_pegawai').on('submit', function(e) {
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

            function create_new() {
                $("#form_pegawai")[0].reset();
            }

            function init() {
                init_btn_upload();
                ajax_form();
            }

            init();
        </script>