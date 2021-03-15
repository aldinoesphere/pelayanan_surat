<div id="single-post">
	<div class="row">
		<div class="section-title text-center center">
	        <div class="overlay">
	        </div>
	    </div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="menu-section pelayanan-surat">
					<h2 class="menu-section-title">LAYANAN PERMOHONAN SURAT</h2>
					<hr>
				</div>
				<form id="form_pelayanan_surat" enctype="multipart/form-data" action="<?php echo base_url('pelayanan_surat/simpan_data'); ?>" method="POST">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="jenis_surat">JENIS SURAT YANG DIMOHON</label>
								<select class="form-control" name="jenis_surat">
									<option value="0">- PILIH JENIS SURAT -</option>
									<?php foreach ($jenis_surat as $surat) :?>
									<option value="<?php echo $surat->kode_surat; ?>"><?php echo $surat->nama_surat; ?></option>
									<?php endforeach;?>
								</select>
							</div>
							<div class="form-group">
					        	<label for="keterangan">KETERANGAN TAMBAHAN</label>
					        	<textarea class="form-control" name="keterangan"></textarea>
					        </div>
							<div class="form-group">
					        	<label for="no_hp">NOMOR TELP / HP</label>
					        	<input type="text" name="no_hp" class="form-control">
					        </div>
						</div>
					</div>
					<div class="row">
						<div class="ajax_load_form">
						
						</div>
					</div>
					<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> KIRIM</button>
					<button class="btn btn-danger"><i class="fa fa-times"></i> BATAL</button>
				</form>
            </div>
		</div>
	</div>
</div>