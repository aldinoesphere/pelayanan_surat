<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	var mainMenu = document.querySelectorAll('.treeview');
	[].forEach.call(mainMenu, function(elm) {
		var subMenuActive = $(elm).find('.active');
		if (subMenuActive){
			console.log($(subMenuActive).parents('li').addClass('active'));
		}
	});
});
</script>