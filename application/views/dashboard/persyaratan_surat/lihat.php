    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Halaman Persyaratan Surat
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Persyaratan Surat</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="box">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Form Persyaratan Surat</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" id="form_persyaratan_surat" action="<?php echo base_url('persyaratan_surat/simpan_persyaratan_surat'); ?>">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="nama_persyaratan">Nama Persyaratan</label>
                                        <input type="text" class="form-control" id="nama_persyaratan" name="nama_persyaratan" placeholder="MASUKAN NAMA PERSYARATAN" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_dokumen">Jenis Dokumen</label>
                                        <select class="form-control" name="jenis_dokumen" required>
                                            <option>- Pilih Jenis Dokumen -</option>
                                            <option value="image/*">Gambar</option>
                                            <option value="application/msword">Dokumen</option>
                                            <option value="application/pdf">PDF</option>
                                        </select>
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
                <div class="col-md-10">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Persyaratan Surat</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="persyaratan_surat" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA PERSYARATAN SURAT</th>
                                        <th>JENIS DOKUMEN</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        foreach ($persyaratan_surat as $persyaratan) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $persyaratan->nama_persyaratan; ?></td>
                                            <td><?php echo $persyaratan->jenis_dokumen; ?></td>
                                            <td>
                                                <a class="btn btn-primary" href="javascript:void(0)" onClick="editField(<?php echo $persyaratan->id; ?>)">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a class="btn btn-danger" href="javascript:void(0)" onClick="deleteField(<?php echo $persyaratan->id; ?>)">
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
        $('#persyaratan_surat').DataTable({});
    });

    function ajax_form() {
        $('#form_persyaratan_surat').on('submit', function(e) {
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
            url : baseUrl+'persyaratan_surat/ajax_table'
        }).done(function(r) {
            $('#persyaratan_surat').DataTable().destroy();
            $('#persyaratan_surat tbody').html(r);
            $('#persyaratan_surat').DataTable({});
            cancel();
        }).fail(function() {

        });
    }

    function deleteField(id) {
        var resultConfirm = confirm('Apakah Anda yakin hapus persyaratan surat ini?');
        if (resultConfirm) {
            $('#loader').show();
            $.ajax({
                url : baseUrl+'persyaratan_surat/hapus_persyaratan_surat/'+id,
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
            url : baseUrl+'persyaratan_surat/cari/'+id,
            dataType: "JSON"
        }).done(function(r){
            $("#form_persyaratan_surat").attr("action", baseUrl+'persyaratan_surat/ubah_persyaratan_surat/'+r.id);
            $("#nama_persyaratan").val(r.nama_persyaratan);
            $("[name=jenis_dokumen]").val(r.jenis_dokumen);
        });
    }

    function cancel() {
        $("#form_persyaratan_surat")[0].reset();
        $("#form_persyaratan_surat").attr("action", baseUrl+'persyaratan_surat/simpan_persyaratan_surat_surat');
    }

    function init() {
        ajax_form();
    }

    init();
</script>