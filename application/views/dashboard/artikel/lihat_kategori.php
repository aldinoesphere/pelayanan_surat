            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Halaman Kategori Artikel
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Kategori</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box">
                                <!-- general form elements -->
                                <div class="box box-primary">
                                    <div class="box-header">
                                        <h3 class="box-title">Form Input Kategori</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <!-- form start -->
                                    <form role="form" id="form_kategori" action="<?php echo base_url('artikel/simpan_kategori'); ?>">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="nama_kategori">Nama Kategori</label>
                                                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Masukan nama kategori artikel" required>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <input type="submit" class="btn btn-primary" value="SIMPAN">
                                            <button type="button" class="btn btn-warning" onclick="cancel();">BATAL</button>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Daftar Kategori</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="kategori" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Artikel</th>
                                                <th>Alias</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 1;
                                                foreach ($semua_kategori as $value) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $value->nama_kategori; ?></td>
                                                    <td><?php echo $value->alias; ?></td>
                                                    <td>
                                                        <a class="btn btn-primary" href="javascript:void(0)" onClick="editField(<?php echo $value->id; ?>)">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a class="btn btn-danger" href="javascript:void(0)" onClick="deleteField(<?php echo $value->id; ?>)">
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
                <strong>Copyright &copy; 2019 <a href="#">Desa ....</a>.</strong> All rights reserved.
            </footer>
        </div>
        <!-- ./wrapper -->
        <?php $this->load->view('dashboard/_parts/js'); ?>
        <!-- REQUIRED JS SCRIPTS -->
        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#kategori').DataTable({});
            });

            function ajax_form() {
                $('#form_kategori').on('submit', function(e) {
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
                    url : baseUrl+'artikel/kategori_ajax_table'
                }).done(function(r) {
                    $('#kategori').DataTable().destroy();
                    $('#kategori tbody').html(r);
                    $('#kategori').DataTable({});
                    cancel();
                }).fail(function() {

                });
            }

            function cancel() {
                $("#form_kategori")[0].reset();
                $("#form_kategori").attr("action", baseUrl+'artikel/simpan_kategori');
            }

            function deleteField(id) {
                var resultConfirm = confirm('Apakah Anda yakin hapus kategori ini?');
                if (resultConfirm) {
                    $('#loader').show();
                    $.ajax({
                        url : baseUrl+'simpan/hapus_kategori/'+id,
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

            function editField(id) {
                $.ajax({
                    url : baseUrl+'artikel/cari_kategori/'+id,
                    dataType: "JSON"
                }).done(function(r){
                    $("#form_kategori").attr("action", baseUrl+'artikel/ubah_kategori/'+r.id);
                    $("#kode_kategori").val(r.kode_kategori);
                    $("#nama_kategori").val(r.nama_kategori);
                });
            }

            function init() {
                ajax_form();
            }

            init();
        </script>