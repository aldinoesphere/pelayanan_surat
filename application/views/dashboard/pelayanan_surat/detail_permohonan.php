    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Halaman Details Permohonan Surat
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><a href="<?php echo base_url('pelayanan_surat'); ?>"> Permohonan Surat</a></li>
                <li class="active">Detail Permohonan</li>
            </ol>
        </section>
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group margin">
                        <a href="<?php echo base_url('/kartu_keluarga/tambah_anggota_keluarga/'.$detail_permohonan_surat[0]->no_kk); ?>">
                            <h4>
                                <i class="fa fa-plus"></i>
                                <span class="text-green"> Tambah Anggota Keluarga</span>
                            </h4>
                        </a>
                    </div>
                    <!-- <div class="btn-group margin">
                        <a href="#">
                            <h4>
                                <i class="fa fa-wrench"></i>
                                <span class="text-green"> Kelola Kartu Keluarga</span>
                            </h4>
                        </a>
                    </div> -->
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-widget widget-user-2">
                        <div class="widget-user-header bg-yellow">
                            <h1 class="widget-user-username">IDENTITAS PEMOHON</h1>
                            <h3 class="widget-user-desc">
                                <?php
                                    echo $detail_permohonan_surat[0]->nama_lengkap;
                                ?>
                            </h3>
                        </div>
                        <div class="box-footer no-padding">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td class="pull-right">
                                            <h4>NIK PEMOHON</h4>
                                        </td>
                                        <td class="col-md-10">
                                            <h4><?php echo $detail_permohonan_surat[0]->nik; ?></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pull-right">
                                            <h4>KODE SURAT / JENIS SURAT</h4>
                                        </td>
                                        <td class="col-md-10">
                                            <h4><?php echo $detail_permohonan_surat[0]->kode_surat; ?> / <?php echo $detail_permohonan_surat[0]->nama_surat; ?></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pull-right">
                                            <h4>NOMOR SURAT</h4>
                                        </td>
                                        <td class="col-md-10">
                                            <h4><?php echo $detail_permohonan_surat[0]->nomor_surat; ?></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pull-right">
                                            <h4>NOMOR HP</h4>
                                        </td>
                                        <td class="col-md-10">
                                            <h4><?php echo $detail_permohonan_surat[0]->no_hp; ?></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pull-right">
                                            <h4>KETERANGAN</h4>
                                        </td>
                                        <td class="col-md-10">
                                            <h4><?php echo $detail_permohonan_surat[0]->keterangan; ?></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pull-right">
                                            <h4>TANGGAL DIBUAT</h4>
                                        </td>
                                        <td class="col-md-10">
                                            <h4>
                                                <?php echo $detail_permohonan_surat[0]->tanggal_buat; ?>
                                            </h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pull-right">
                                            <h4>STATUS</h4>
                                        </td>
                                        <td class="col-md-10">
                                            <h4><?php echo $detail_permohonan_surat[0]->status; ?></h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="page-header">DOKUMEN PERSYARATAN</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">DAFTAR DOKUMEN / KELENGKAPAN PENDUDUK YANG DIBUTUHKAN</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="dokumen_permohonan_surat" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>PERSYARATAN</th>
                                        <th>DOKUMEN</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        foreach ($dokumen_permohonan_surat as $dokumen) :
                                    ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $dokumen->nama_persyaratan; ?></td>
                                            <td><?php echo $dokumen->dokumen_persyaratan; ?></td>
                                            <td>
                                                <a class="btn btn-info" href="<?php echo base_url('kartu_keluarga/detail_ak/'.$dokumen->id); ?>">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a class="btn btn-primary" href="<?php echo base_url('kartu_keluarga/ubah_anggota_keluarga/'.$dokumen->id); ?>">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a class="btn btn-danger" href="javascript:void(0)" onClick="deleteField(<?php echo $dokumen->id; ?>)">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                        $i++;
                                        endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
    </div>
    <footer class="main-footer">
        <strong>Copyright &copy; 2019 <a href="#"><?php echo ambil_pengaturan('nama_website'); ?></a>.</strong> All rights reserved.
    </footer>
</div>
<?php $this->load->view('dashboard/_parts/js'); ?>
<!-- REQUIRED JS SCRIPTS -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#pegawai_keluarga').DataTable({});
    });
    function deleteField(nik) {
        var resultConfirm = confirm('Apakah Anda yakin hapus anggota keluarga ini?');
        if (resultConfirm) {
            $('#loader').show();
            $.ajax({
                url : baseUrl+'kartu_keluarga/hapus_ak/'+nik,
                dataType : 'JSON'
            }).done(function(r) {
                reinitDataTable();
                $('#loader').hide();
                $.notify(r.msg, r.cls);
            }).fail(function() {
                $('#loader').hide();
            });
        }
    }

    function reinitDataTable() {
        $.ajax({
            url : baseUrl+'kartu_keluarga/ajax_table_ak'
        }).done(function(r) {
            $('#pegawai_keluarga').DataTable().destroy();
            $('#pegawai_keluarga tbody').html(r);
            $('#pegawai_keluarga').DataTable({});
        }).fail(function() {

        });
    }
</script>