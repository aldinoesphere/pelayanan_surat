            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Halaman Input Penduduk Baru
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active"><a href="<?php echo base_url('penduduk'); ?>">Penduduk</a></li>
                        <li class="active">Input Penduduk</li>
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
                                        <h3 class="box-title">Form Input Penduduk Baru</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <!-- form start -->
                                    <form role="form" id="form_penduduk" action="<?php echo base_url('penduduk/simpan_penduduk'); ?>">
                                        <div class="box-body">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="no_kk">NO KK</label>
                                                    <select class="form-control select2" name="no_kk" id="no_kk" required>
                                                        <option value="0">- PILIH KARTU KELUARGA -</option>
                                                        <?php foreach ($kartu_keluarga as $kk) :?>
                                                            <option value="<?php echo $kk->no_kk; ?>">
                                                                <?php echo $kk->no_kk; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nik">NIK</label>
                                                    <input type="text" class="form-control" id="nik" name="nik" placeholder="MASUKAN NOMOR IDENTITAS KEPENDUDUKAN" maxlength="16" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama_lengkap">NAMA LENGKAP</label>
                                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="MASUKAN NAMA LENGKAP PENDUDUK" required>
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
                                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="MASUKAN TEMPAT LAHIR PENDUDUK" required>
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
                                                <div class="form-group">
                                                    <label for="kode_agama">AGAMA</label>
                                                    <select class="form-control" name="kode_agama" id="kode_agama" required>
                                                        <option value="0">- PILIH AGAMA -</option>
                                                        <?php foreach ($agama as $value_agama) :?>
                                                            <option value="<?php echo $value_agama->kode_agama; ?>">
                                                                <?php echo $value_agama->nama_agama; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kode_pendidikan">PENDIDIKAN</label>
                                                    <select class="form-control select2" name="kode_pendidikan" id="kode_pendidikan" required>
                                                        <option value="0">- PILIH PENDIDIKAN -</option>
                                                        <?php foreach ($pendidikan as $value_pendidikan) :?>
                                                            <option value="<?php echo $value_pendidikan->kode_pendidikan; ?>">
                                                                <?php echo $value_pendidikan->nama_pendidikan; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="kode_pekerjaan">PEKERJAAN</label>
                                                    <select class="form-control select2" name="kode_pekerjaan" id="kode_pekerjaan" required>
                                                        <option value="0">- PILIH PEKERJAAN -</option>
                                                        <?php foreach ($pekerjaan as $value_pekerjaan) :?>
                                                            <option value="<?php echo $value_pekerjaan->kode_pekerjaan; ?>">
                                                                <?php echo $value_pekerjaan->nama_pekerjaan; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kode_status_kawin">STATUS KAWIN</label>
                                                    <select class="form-control" id="kode_status_kawin" name="kode_status_kawin" required>
                                                        <option value="0">- PILIH STATUS PERKAWINAN -</option>
                                                        <?php foreach ($status_kawin as $value_status_kawin) :?>
                                                            <option value="<?php echo $value_status_kawin->kode_status_kawin; ?>">
                                                                <?php echo $value_status_kawin->nama_status_kawin; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kode_hubungan">STATUS HUBUNGAN DALAM KELUARGA</label>
                                                    <select class="form-control select2" name="kode_hubungan" id="kode_hubungan" required>
                                                        <option value="0">- PILIH STATUS HUBUNGAN DALAM KELUARGA -</option>
                                                        <?php foreach ($hubungan as $value_hubungan) :?>
                                                            <option value="<?php echo $value_hubungan->kode_hubungan; ?>">
                                                                <?php echo $value_hubungan->nama_hubungan; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="warganegara">KEWARGANEGARAAN</label>
                                                    <input type="text" class="form-control" id="warganegara" name="warganegara" placeholder="MASUKAN NAMA PENDIDIKAN" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="paspor">PASPOR</label>
                                                    <input type="text" class="form-control" id="paspor" name="paspor" placeholder="MASUKAN NAMA PENDIDIKAN" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kitas">KITAS/KITAP</label>
                                                    <input type="text" class="form-control" id="kitas" name="kitas" placeholder="MASUKAN NAMA PENDIDIKAN" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ayah">AYAH</label>
                                                    <input type="text" class="form-control" id="ayah" name="ayah" placeholder="MASUKAN NAMA PENDIDIKAN" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ibu">IBU</label>
                                                    <input type="text" class="form-control" id="ibu" name="ibu" placeholder="MASUKAN NAMA PENDIDIKAN" required>
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
                <strong>Copyright &copy; 2019 <a href="#">Desa ....</a>.</strong> All rights reserved.
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

            function ajax_form() {
                $('#form_penduduk').on('submit', function(e) {
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
                $("#form_penduduk")[0].reset();
            }

            function init() {
                ajax_form();
            }

            init();
        </script>