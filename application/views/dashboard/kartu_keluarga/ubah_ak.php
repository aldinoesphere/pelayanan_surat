            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Halaman ubah data Anggota Keluarga
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active"><a href="<?php echo base_url('kartu_keluarga'); ?>">Kartu Keluarga</a></li>
                        <li class="active"><a href="<?php echo base_url('kartu_keluarga/details/'.$penduduk[0]->no_kk); ?>">Details</a></li>
                        <li class="active">Ubah data anggota keluarga</li>
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
                                        <h3 class="box-title">Form ubah data Anggota Keluarga</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <!-- form start -->
                                    <form role="form" id="form_ak" action="<?php echo base_url('kartu_keluarga/ubah_ak'); ?>">
                                    <?php foreach ($penduduk as $data_penduduk) :?>
                                        <div class="box-body">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="no_kk">NO KK</label>
                                                    <input type="number" class="form-control" id="no_kk" name="no_kk" value="<?php echo $data_penduduk->no_kk; ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nik">NIK</label>
                                                    <input type="text" class="form-control" id="nik" name="nik" value="<?php echo $data_penduduk->nik; ?>" placeholder="MASUKAN NOMOR IDENTITAS KEPENDUDUKAN" maxlength="16" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama_lengkap">NAMA LENGKAP</label>
                                                    <input type="text" class="form-control" id="nama_lengkap" value="<?php echo $data_penduduk->nama_lengkap; ?>" name="nama_lengkap" placeholder="MASUKAN NAMA LENGKAP PENDUDUK" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jk">JENIS KELAMIN</label>
                                                    <select class="form-control auto_select" id="jk" name="jk" value="<?php echo $data_penduduk->jk; ?>" required>
                                                        <option value="0">- PILIH JENIS KELAMIN -</option>
                                                        <option value="1">LAKI - LAKI</option>
                                                        <option value="2">PEREMPUAN</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tempat_lahir">TEMPAT LAHIR</label>
                                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $data_penduduk->tempat_lahir; ?>" placeholder="MASUKAN TEMPAT LAHIR PENDUDUK" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tgl_lahir">TANGGAL LAHIR</label>
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="text" class="form-control pull-right" id="tgl_lahir" name="tgl_lahir" value="<?php echo date("Y-m-d", strtotime($data_penduduk->tgl_lahir)); ?>" placeholder="dd/mm/yyyy" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kode_agama">AGAMA</label>
                                                    <select class="form-control auto_select" name="kode_agama" id="kode_agama" value="<?php echo $data_penduduk->kode_agama; ?>" required>
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
                                                    <select class="form-control select2 auto_select" name="kode_pendidikan" id="kode_pendidikan" value="<?php echo $data_penduduk->kode_pendidikan; ?>" required>
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
                                                    <select class="form-control select2 auto_select" name="kode_pekerjaan" id="kode_pekerjaan" value="<?php echo $data_penduduk->kode_pekerjaan; ?>" required>
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
                                                    <select class="form-control auto_select" id="kode_status_kawin" name="kode_status_kawin" value="<?php echo $data_penduduk->kode_status_kawin; ?>" required>
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
                                                    <select class="form-control select2 auto_select" name="kode_hubungan" id="kode_hubungan" value="<?php echo $data_penduduk->kode_hubungan; ?>" required>
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
                                                    <input type="text" class="form-control" id="warganegara" name="warganegara" value="<?php echo $data_penduduk->warganegara; ?>" placeholder="MASUKAN NAMA PENDIDIKAN" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="paspor">PASPOR</label>
                                                    <input type="text" class="form-control" id="paspor" name="paspor" value="<?php echo $data_penduduk->paspor; ?>" placeholder="MASUKAN NAMA PENDIDIKAN" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kitas">KITAS/KITAP</label>
                                                    <input type="text" class="form-control" id="kitas" name="kitas" value="<?php echo $data_penduduk->kitas; ?>" placeholder="MASUKAN NAMA PENDIDIKAN" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ayah">AYAH</label>
                                                    <input type="text" class="form-control" id="ayah" name="ayah" value="<?php echo $data_penduduk->ayah; ?>" placeholder="MASUKAN NAMA PENDIDIKAN" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ibu">IBU</label>
                                                    <input type="text" class="form-control" id="ibu" name="ibu" value="<?php echo $data_penduduk->ibu; ?>" placeholder="MASUKAN NAMA PENDIDIKAN" required>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <input type="submit" class="btn btn-primary" value="SIMPAN">
                                            <a href="<?php echo base_url('kartu_keluarga/details/'.$penduduk[0]->no_kk); ?>" class="btn btn-info"> <i class="fa fa-reply"></i> KEMBALI</a>
                                        </div>
                                    <?php endforeach; ?>
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

                $.each($(".auto_select"), function(i, elm){
                    var itemValue = $(this).attr('value');
                    if ($(this).hasClass('select2')) {
                        $(this).val(itemValue);
                        $(this).trigger('change');
                    } else {
                        $(this).find('option[value='+itemValue+']').attr('selected', true);
                    }
                });
            });

            function ajax_form() {
                $('#form_ak').on('submit', function(e) {
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
                $("#form_ak")[0].reset();
            }

            function init() {
                ajax_form();
            }

            init();
        </script>