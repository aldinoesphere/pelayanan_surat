    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Halaman Details Anggota Keluarga
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><a href="<?php echo base_url('kartu_keluarga/details/'.$penduduk[0]->no_kk); ?>"> Kartu Keluarga</a></li>
                <li class="active">Detail Anggota Keluarga</li>
            </ol>
        </section>
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="box box-warning">
                        <div class="box-body box-profile">
                            <?php foreach ($penduduk as $ak) : ?>
                                <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets'); ?>/dist/img/user4-128x128.jpg" alt="User profile picture">
                                <h3 class="profile-username text-center"><?php echo $ak->nama_lengkap; ?></h3>
                                <p class="text-muted text-center">
                                    <?php
                                        switch ($ak->kode_hubungan) {
                                            case '01':
                                                echo '<i class="fa fa-star text-warning"></i> ' . $ak->nama_hubungan;        
                                                break;
                                             
                                            default:
                                                echo $ak->nama_hubungan;
                                                break;
                                        }
                                    ?>
                                </p>

                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <b>JENIS KELAMIN</b> <a class="pull-right">
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
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>TEMPAT</b>
                                        <a class="pull-right">
                                            <?php echo $ak->tempat_lahir; ?>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>TANGGAL LAHIR</b>
                                        <a class="pull-right">
                                            <?php echo date('d-M-Y',strtotime($ak->tgl_lahir)); ?>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>AGAMA</b>
                                        <a class="pull-right">
                                            <?php echo $ak->nama_agama; ?>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>PENDIDIKAN</b>
                                        <a class="pull-right">
                                            <?php echo $ak->nama_pendidikan; ?>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>PEKERJAAN</b>
                                        <a class="pull-right">
                                            <?php echo $ak->nama_pekerjaan; ?>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>STATUS KAWIN</b>
                                        <a class="pull-right">
                                            <?php echo $ak->nama_status_kawin; ?>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>WARGANEGARA</b>
                                        <a class="pull-right">
                                            <?php echo $ak->warganegara; ?>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>PASPOR</b>
                                        <a class="pull-right">
                                            <?php echo $ak->paspor; ?>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>KITAS/KITAP</b>
                                        <a class="pull-right">
                                            <?php echo $ak->kitas; ?>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>NAMA AYAH</b>
                                        <a class="pull-right">
                                            <?php echo $ak->ayah; ?>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>NAMA IBU</b>
                                        <a class="pull-right">
                                            <?php echo $ak->ibu; ?>
                                        </a>
                                    </li>
                                </ul>

                                <a href="<?php echo base_url('kartu_keluarga/ubah_anggota_keluarga/'.$ak->nik); ?>" class="btn btn-primary btn-block"><b><i class="fa fa-pencil"></i> Kelola anggota keluarga</b></a>
                                <a href="<?php echo base_url('kartu_keluarga/details/'.$ak->no_kk); ?>" class="btn btn-info btn-block"><b><i class="fa fa-reply"></i> Kembali</b></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
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
    //
</script>