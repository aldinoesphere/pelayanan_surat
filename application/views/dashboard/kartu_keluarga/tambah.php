            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Tambah Kartu Keluarga
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Kartu Keluarga</li>
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
                                    <h3 class="box-title">Form Kartu Keluarga</h3>
                                    <div class="pull-right box-tools">
                                        <a class="btn btn-primary" href="<?php echo base_url('kartu_keluarga'); ?>"><i class="fa fa-mail-reply"></i></a>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" id="form_kk" action="<?php echo base_url('kartu_keluarga/simpan_kk'); ?>">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="no_kk">Nomor Kartu Keluarga</label>
                                            <input type="number" class="form-control" id="no_kk" name="no_kk" placeholder="Masukan No Kartu Keluarga" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="col-md-6">
                                                <label for="rt">Rt</label>
                                                <select class="form-control" name="rt" required>
                                                    <option>- Pilih Rt -</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="rw">Rw</label>
                                                <select class="form-control" name="rw" required>
                                                    <option>- Pilih Rw -</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="kelurahan">Kelurahan</label>
                                            <input type="text" class="form-control" id="kelurahan" name="kelurahan" value="KRIMUN" readonly required>
                                        </div>
                                        <div class="form-group">
                                            <label for="kecamatan">Kecamatan</label>
                                            <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="LOSARANG" readonly required>
                                        </div>
                                        <div class="form-group">
                                            <label for="kota">Kabupaten/Kota</label>
                                            <input type="text" class="form-control" id="kota" name="kota" value="INDRAMAYU" readonly required>
                                        </div>
                                        <div class="form-group">
                                            <label for="kode_pos">Kode POS</label>
                                            <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="45253" readonly required>
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
        <!-- REQUIRED JS SCRIPTS -->
        <script type="text/javascript">
            function ajax_form() {
                $('#form_kk').on('submit', function(e) {
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
                        $(form)[0].reset();
                        $('.form-loading').hide();
                        $.notify(r.msg, r.cls);
                    }).fail(function() {
                        $('.form-loading').hide();
                    });
                });
            }

            function init() {
                ajax_form();
            }

            init();
        </script>
