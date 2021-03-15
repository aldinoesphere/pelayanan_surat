    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Halaman Penduduk
                <a href="<?php echo base_url('/penduduk/tambah_penduduk/'); ?>" class="btn btn-primary">
                    Tambah Penduduk
                </a>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Penduduk</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Penduduk Desa</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="penduduk" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NIK</th>
                                        <th>NAMA LENGKAP</th>
                                        <th>JENIS KELAMIN</th>
                                        <th>UMUR</th>
                                        <th>ALAMAT</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        foreach ($penduduk as $ak) {
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
                                            <td><?php echo $ak->tgl_lahir; ?></td>
                                            <td><?php echo $ak->alamat; ?></td>
                                            <td>
                                                <a class="btn btn-info" href="<?php echo base_url('penduduk/details/'.$ak->nik) ?>">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a class="btn btn-primary" href="<?php echo base_url('penduduk/ubah_penduduk/'.$ak->nik); ?>">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a class="btn btn-danger" href="javascript:void(0)" onClick="deleteField(<?php echo $ak->nik; ?>)">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                        $i++;
                                        }
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
        $('#penduduk').DataTable({});
    });

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
                reinitDataTable();
                $('.form-loading').hide();
                $.notify(r.msg, r.cls);
            }).fail(function() {
                $('.form-loading').hide();
            });
        });
    }

    function reinitDataTable() {
        $.ajax({
            url : baseUrl+'penduduk/ajax_table'
        }).done(function(r) {
            $('#penduduk').DataTable().destroy();
            $('#penduduk tbody').html(r);
            $('#penduduk').DataTable({});
        }).fail(function() {

        });
    }

    function deleteField(id) {
        var resultConfirm = confirm('Apakah Anda yakin hapus data penduduk ini?');
        if (resultConfirm) {
            $('#loader').show();
            $.ajax({
                url : baseUrl+'penduduk/hapus/'+id,
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

    function init() {
        ajax_form();
    }

    init();
</script>