    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Halaman
                <a href="<?php echo base_url('/halaman/tambah/'); ?>" class="btn btn-primary">
                    Tambah Halaman Baru
                </a>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Halaman</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Halaman</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="halaman" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA HALAMAN</th>
                                        <th>PENULIS</th>
                                        <th>TANGGAL</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        foreach ($semua_halaman as $halaman) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $halaman->judul; ?></td>
                                            <td><?php echo $halaman->penulis; ?></td>
                                            <td>
                                                <?php 
                                                    switch ($halaman->status) {
                                                        case 0:
                                                            echo 'Draft';
                                                            break;
                                                        
                                                        default:
                                                            echo "Diterbitkan";
                                                            break;
                                                    }
                                                ?>
                                                <br>
                                                <?php echo $halaman->diubah; ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-info" href="<?php echo base_url('halaman/'.$halaman->alias) ?>">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a class="btn btn-primary" href="<?php echo base_url('halaman/ubah/'.$halaman->id); ?>">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a class="btn btn-danger" href="javascript:void(0)" onClick="deleteField(<?php echo $halaman->id; ?>)">
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
        $('#halaman').DataTable({});
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
            url : baseUrl+'halaman/ajax_table'
        }).done(function(r) {
            $('#halaman').DataTable().destroy();
            $('#halaman tbody').html(r);
            $('#halaman').DataTable({});
        }).fail(function() {

        });
    }

    function deleteField(id) {
        var resultConfirm = confirm('Apakah Anda yakin hapus data halaman ini?');
        if (resultConfirm) {
            $('#loader').show();
            $.ajax({
                url : baseUrl+'halaman/hapus/'+id,
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