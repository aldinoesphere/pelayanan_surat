<!DOCTYPE html>
<html>
<head>
	<title>HALAMAN PELAYANAN SURAT</title>
	<!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Admin LTE CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
</head>
<body>
	<div class="wrapper">
		<div class="content-wrapper">
			<div class="col-md-6">
				<!-- callout -->
				<?php
					if ($this->session->flashdata('error')) :
				?>
					<div class="callout callout-danger" id="informasi">
						<?php echo $this->session->flashdata('error'); ?>
		        	</div>
				<?php endif; ?>
		        <div class="callout callout-info" id="informasi">

		        </div>
		        <form id="form_pelayanan_surat" action="<?php echo base_url('pelayanan_surat/simpan_data'); ?>" method="POST">
			        <div class="form-group">
			        	<label for="nik">Masukan NIK pemohon</label>
			        	<input type="text" name="nik" class="form-control">
			        </div>
					<div class="form-group">
						<label for="jenis_surat">Jenis surat</label>
						<select class="form-control" name="jenis_surat">
							<?php foreach ($jenis_surat as $surat) :?>
							<option value="<?php echo $surat->kode_surat; ?>"><?php echo $surat->nama_surat; ?></option>
							<?php endforeach;?>
						</select>
					</div>
					<div class="ajax_load_form">
						
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script type="text/javascript">var baseUrl = '<?php echo base_url(); ?>';</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('[name=jenis_surat]').change(function(){
			$.ajax({
				url : baseUrl+'pelayanan_surat/ajax_load_form/'+this.value,
				dataType:'JSON'
			}).done(function(r) {
				$('.ajax_load_form').html(r.html);
				$('#informasi').html(r.informasi);
			});
		});
	});
</script>
</html>
