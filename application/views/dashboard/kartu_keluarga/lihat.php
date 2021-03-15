    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Halaman Kartu Keluarga
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Kartu Keluarga</li>
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
                                <h3 class="box-title">Form Kartu Keluarga</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" id="form_kk" action="<?php echo base_url('kartu_keluarga/simpan_kk'); ?>">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="no_kk">Nomor Kartu Keluarga</label>
                                        <input type="number" class="form-control" id="no_kk" name="no_kk" placeholder="Masukan No Kartu Keluarga" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label for="rt">Rt</label>
                                            <select class="form-control" name="rt" required>
                                                <option>- Pilih Rt -</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="rw">Rw</label>
                                            <select class="form-control" name="rw" required>
                                                <option>- Pilih Rw -</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="kelurahan">Kelurahan</label>
                                        <input type="text" class="form-control" id="kelurahan" name="kelurahan" value="KRIMUN" readonly required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kecamatan">Kecamatan</label>
                                        <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="LOSARANG" readonly required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kota">Kabupaten/Kota</label>
                                        <input type="text" class="form-control" id="kota" name="kota" value="INDRAMAYU" readonly required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kode_pos">Kode POS</label>
                                        <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="45253" readonly required>
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
                            <h3 class="box-title">Data Kartu Keluarga</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="kartu_keluarga" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NO KK</th>
                                        <th>ALAMAT</th>
                                        <th>RT</th>
                                        <th>RW</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        foreach ($kartu_keluarga as $kk) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $kk->no_kk; ?></td>
                                            <td><?php echo $kk->alamat; ?></td>
                                            <td><?php echo $kk->rt; ?></td>
                                            <td><?php echo $kk->rw; ?></td>
                                            <td>
                                                <a class="btn btn-info" href="<?php echo base_url('kartu_keluarga/details/'.$kk->no_kk) ?>">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a class="btn btn-primary" href="javascript:void(0)" onClick="editField(<?php echo $kk->id; ?>)">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a class="btn btn-danger" href="javascript:void(0)" onClick="deleteField(<?php echo $kk->id; ?>)">
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
        $('#kartu_keluarga').DataTable({});
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
            url : baseUrl+'kartu_keluarga/ajax_table'
        }).done(function(r) {
            $('#kartu_keluarga').DataTable().destroy();
            $('#kartu_keluarga tbody').html(r);
            $('#kartu_keluarga').DataTable({});
            cancel();
        }).fail(function() {

        });
    }

    function deleteField(id) {
        var resultConfirm = confirm('Apakah Anda yakin hapus kartu keluarga ini?');
        if (resultConfirm) {
            $('#loader').show();
            $.ajax({
                url : baseUrl+'kartu_keluarga/hapus/'+id,
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
            url : baseUrl+'kartu_keluarga/cari/'+id,
            dataType: "JSON"
        }).done(function(r){
            $("#form_kk").attr("action", baseUrl+'kartu_keluarga/ubah/'+r.id);
            $("#no_kk").val(r.no_kk);
            $("#alamat").val(r.alamat);
            $("[name=rt]").val(r.rt);
            $("[name=rw]").val(r.rw);
        });
    }

    function cancel() {
        $("#form_kk")[0].reset();
        $("#form_kk").attr("action", baseUrl+'kartu_keluarga/simpan_kk');
    }

    function init() {
        ajax_form();
    }

    init();
</script>