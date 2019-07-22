    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Halaman Details Kartu Keluarga
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><a href="<?php echo base_url('kartu_keluarga'); ?>"> Kartu Keluarga</a></li>
                <li class="active">Details</li>
            </ol>
        </section>
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group margin">
                        <a href="<?php echo base_url('/kartu_keluarga/tambah_anggota_keluarga/'.$kartu_keluarga[0]->no_kk); ?>">
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
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?php echo base_url('assets/dist/img/user7-128x128.jpg');?>" alt="User Avatar">
                            </div>
                            <h1 class="widget-user-username">Keluarga (KK)</h1>
                            <h3 class="widget-user-desc">
                                <?php foreach ($anggota_keluarga as $ak) {
                                    if ($ak->kode_hubungan == '01') {
                                        echo $ak->nama_lengkap;
                                    }
                                }?>
                            </h3>
                        </div>
                        <div class="box-footer no-padding">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td class="pull-right">
                                            <h4>NO KK</h4>
                                        </td>
                                        <td class="col-md-10">
                                            <h4><?php echo $kartu_keluarga[0]->no_kk; ?></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pull-right">
                                            <h4>ALAMAT</h4>
                                        </td>
                                        <td class="col-md-10">
                                            <h4><?php echo $kartu_keluarga[0]->alamat; ?></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pull-right">
                                            <h4>RT/RW KELURAHAN</h4>
                                        </td>
                                        <td class="col-md-10">
                                            <h4>
                                                <?php echo $kartu_keluarga[0]->rt.'/'.$kartu_keluarga[0]->rw.' '.$kartu_keluarga[0]->kelurahan; ?>
                                            </h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="page-header">Anggota Keluarga</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Daftar Anggota Kartu Keluarga</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="anggota_keluarga" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NIK</th>
                                        <th>NAMA</th>
                                        <th>JENIS KELAMIN</th>
                                        <th>HUBUNGAN DALAM KELUARGA</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        foreach ($anggota_keluarga as $ak) :
                                    ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $ak->nik; ?></td>
                                            <td><?php echo $ak->nama_lengkap; ?></td>
                                            <td>
                                                <?php
                                                    switch ($ak->jk) {
                                                        case '1':
                                                            echo "LAKI-LAKI";
                                                            break;
                                                        
                                                        default:
                                                            echo "PEREMPUAN";
                                                            break;
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    if ($ak->kode_hubungan === '01') {
                                                        echo '<i class="fa fa-star text-warning"></i>';
                                                    }
                                                ?>
                                                <?php echo $ak->nama_hubungan; ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-info" href="<?php echo base_url('kartu_keluarga/detail_ak/'.$ak->nik); ?>">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a class="btn btn-primary" href="<?php echo base_url('kartu_keluarga/ubah_anggota_keluarga/'.$ak->nik); ?>">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a class="btn btn-danger" href="javascript:void(0)" onClick="deleteField(<?php echo $ak->nik; ?>)">
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
        <strong>Copyright &copy; 2019 <a href="#">Desa ....</a>.</strong> All rights reserved.
    </footer>
</div>
<?php $this->load->view('dashboard/_parts/js'); ?>
<!-- REQUIRED JS SCRIPTS -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#anggota_keluarga').DataTable({});
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
            $('#anggota_keluarga').DataTable().destroy();
            $('#anggota_keluarga tbody').html(r);
            $('#anggota_keluarga').DataTable({});
        }).fail(function() {

        });
    }
</script>