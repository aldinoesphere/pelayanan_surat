<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- Notify JS -->
<script src="<?php echo base_url(); ?>assets/bower_components/notify/notify.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- baseUrl -->
<script type="text/javascript">var baseUrl = '<?php echo base_url(); ?>';</script>

<script type="text/javascript">
$(document).ready(function() {
	var mainMenu = document.querySelectorAll('.treeview');
	[].forEach.call(mainMenu, function(elm) {
		var subMenuActive = $(elm).find('.active');
		if (subMenuActive){
			$(subMenuActive).parents('li').addClass('active')
		}
	});
});
</script>