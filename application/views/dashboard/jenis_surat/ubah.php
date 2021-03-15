            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Ubah Jenis Surat
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Jenis Surat</li>
                        <li class="active">Ubah</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content container-fluid">
                    <div class="col-md-12">
                        <?php foreach ($jenis_surat as $data_jenis_surat) :?>
                        <div class="box">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Masukan Data Jenis Surat</h3>
                                    <div class="pull-right box-tools">
                                        <a class="btn btn-primary" href="<?php echo base_url('jenis_surat'); ?>"><i class="fa fa-mail-reply"></i></a>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" id="form_jenis_surat" action="<?php echo base_url('jenis_surat/update/'.$data_jenis_surat->id); ?>">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="kode_surat">KODE SURAT</label>
                                            <input type="text" class="form-control" id="kode_surat" name="kode_surat" value="<?php echo $data_jenis_surat->kode_surat; ?>" placeholder="MASUKAN KODE SURAT" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_surat">NAMA SURAT</label>
                                            <input type="text" class="form-control" id="nama_surat" name="nama_surat" value="<?php echo $data_jenis_surat->nama_surat; ?>" placeholder="NAMA SURAT" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="informasi">INFORMASI</label>
                                            <textarea id="informasi" name="informasi" rows="10" cols="80">
                                                <?php echo $data_jenis_surat->informasi; ?>
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="upload-template"><i class="fa fa-upload"></i> Unggah Template Surat</label>
                                            <input type="file" id="file-add-template" accept="rtf" name="file-template">
                                        </div>
                                        <hr>
                                        <!-- Custom Field surat -->
                                        <div class="form-group text-right">
                                            <a href="javascript:void(0)" class="btn btn-primary add-field"> PERSYARATAN SURAT <i class="fa fa-plus-circle"></i></a>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-builder">
                                                <?php
                                                    if ($persyaratan) : 
                                                        foreach ($persyaratan as $syarat) :
                                                ?>
                                                    <div class="item-field col-md-12">
                                                        <div class="col-md-10 col-sm-10 form-group">
                                                            <label class="control-label">PERSYARATAN</label>
                                                            <select class="form-control select2 auto_select" value="<?php echo $syarat; ?>" name="persyaratan[]">
                                                                <?php
                                                                    foreach ($persyaratan_surat as $ps) {
                                                                ?>
                                                                    <option value="<?php echo $ps->id; ?>">
                                                                        <?php echo $ps->nama_persyaratan; ?>
                                                                    </option>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2 btn-remove">
                                                            <a href="javascript:void(0)" class="btn btn-danger remove-item-field">
                                                                <i class="fa fa-minus-circle"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                <?php 
                                                        endforeach;
                                                    else :
                                                ?>
                                                    <p class="text-center field-default">Tidak ada data Field tambahan</p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <!-- /Custom Field surat -->
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
                        <?php endforeach; ?>
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
                $('#form_jenis_surat').on('submit', function(e) {
                    e.preventDefault();
                    $('.form-loading').show();
                    $.ajax({
                        url : $(this).attr('action'),
                        dataType : 'JSON',
                        type : "POST",
                        data : new FormData(this),
                        processData :false,
                        contentType :false,
                        cache :false
                    }).done(function(r) {
                        $('.form-loading').hide();
                        $.notify(r.msg, r.cls);
                    }).fail(function() {
                        $('.form-loading').hide();
                    });
                });
            }

            function btnRemoveField() {
                var removeGrosir = document.querySelectorAll('.remove-item-field'); 
                [].forEach.call(removeGrosir, function(elm) {
                    $(elm).click(function(){
                        var itemField = $(this).closest('.item-field');
                        $(itemField).remove();
                        if ($('.item-field').length <= 0) {
                            $('.form-builder').html('<p class="text-center field-default">Tidak ada data Field tambahan</p>');
                        }
                    });
                });
            }


            function btnAddField() {
                $('.add-field').click(function(){
                    if ($('.field-default')) {
                        $('.field-default').remove();
                    }
                    $.ajax({
                        url : baseUrl+'jenis_surat/ajax_persyaratan_surat',
                        dataType : 'JSON'
                    }).done(function(r) {
                        $('.form-builder').append(r.html);
                        $(".select2").select2();
                        btnRemoveField();
                    }).fail(function() {
                        btnRemoveField();
                    });
                });
            }

            function init() {
                ajax_form();
                btnAddField();
                btnRemoveField();
                var editor = CKEDITOR.replace('informasi');
                editor.on('change', function(evt) {
                    $('#informasi').html(evt.editor.getData());
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
