<footer class="main-footer">
	<div class="float-right d-none d-sm-block">
		<b>Versi</b> 1.0.0
	</div>
	<strong>Copyright &copy; <?php echo date("Y");?>
</footer>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<!-- page script -->
<script type="text/javascript">
	$(function() {
			startRefresh();
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
	   });
	});
	
	function startRefresh() {
		var auto_refresh = setInterval(
			function () {
				$('#jumlah_alarm_sidebar').load('<?php echo base_url(); ?>alarm/jumlahalarm').fadeIn("slow");
				$('#jumlah_pesan_sidebar').load('<?php echo base_url(); ?>pesanlaporan/jumlahpesan').fadeIn("slow");
				$('#judul_halaman').load('<?php echo base_url(); ?>alarm/judulhalaman').fadeIn("slow");
				$('#tabel_alarm').load('<?php echo base_url(); ?>alarm/tabelalarm').fadeIn("slow");
				$('#tabel_pesan').load('<?php echo base_url(); ?>pesanlaporan/tabelpesan').fadeIn("slow");
			}, 1000);
	}
</script>
</body>
</html>
