    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Album Gallery
                <a href="<?php echo base_url('/gallery/tambah_album_foto/'); ?>" class="btn btn-primary">
                    Tambah Album Baru
                </a>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Gallery</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Album</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="album_foto" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Album</th>
                                        <th style="white-space: nowrap;width: 35%;">Album</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        foreach ($galleries as $gallery) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $gallery->judul; ?></td>
                                            <td style="white-space: nowrap;width: 35%;">
                                                <div class="col-md-3">
                                                    <img src="<?php echo base_url(get_link_foto($gallery->cover_album)); ?>" style="width: 100%;">
                                                </div>
                                            </td>
                                            <td>
                                                <a class="btn btn-danger" href="javascript:void(0)" onClick="deleteField(<?php echo $gallery->id; ?>)">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <a class="btn btn-primary" href="<?php echo base_url('gallery/ubah_album_foto/'. $gallery->id); ?>">
                                                    <i class="fa fa-pencil"></i>
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
        $('#album_foto').DataTable({});
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
            url : baseUrl+'gallery/album_foto_ajax_table'
        }).done(function(r) {
            $('#album_foto').DataTable().destroy();
            $('#album_foto tbody').html(r);
            $('#album_foto').DataTable({});
        }).fail(function() {

        });
    }

    function deleteField(id) {
        var resultConfirm = confirm('Apakah Anda yakin hapus data album foto ini?');
        if (resultConfirm) {
            $('#loader').show();
            $.ajax({
                url : baseUrl+'gallery/hapus_album_foto/'+id,
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