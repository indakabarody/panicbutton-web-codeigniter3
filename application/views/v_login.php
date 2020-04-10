<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>DKT Panic Button | Admin Login</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/dist/img/PanicButtonLogo.png">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!-- icheck bootstrap -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
		<!-- Google Font: Source Sans Pro -->
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	</head>
	<body class="hold-transition login-page">
		<div class="login-box">
			<div class="login-logo">
				<a href="<?php echo base_url(); ?>assets/index2.html"><b>DKT</b> PANIC BUTTON</a>
			</div>
			<!-- /.login-logo -->
			<div class="card">
				<div class="card-body login-card-body">
					<p class="login-box-msg">Silakan login untuk melanjutkan</p>
					<script src="<?php echo base_url(); ?>assets/plugins/sweetalert/sweetalert.all.js"></script>
					<script>
						<?php
							if ($this->session->flashdata('success')) {
								echo "Swal.fire({'title':'".$this->session->flashdata('success')."','text':'','showConfirmButton':false,'icon':'success','toast':true,'position':'top-end','showCloseButton':true,'timer':5000});";
							} elseif ($this->session->flashdata('error')) {
								echo "Swal.fire({'title':'".$this->session->flashdata('error')."','text':'','showConfirmButton':false,'icon':'error','toast':true,'position':'top-end','showCloseButton':true,'timer':5000});";
							} elseif ($this->session->flashdata('warning')) {
								echo "Swal.fire({'title':'".$this->session->flashdata('warning')."','text':'','showConfirmButton':false,'icon':'warning','toast':true,'position':'top-end','showCloseButton':true,'timer':5000});";
							} elseif ($this->session->flashdata('info')) {
								echo "Swal.fire({'title':'".$this->session->flashdata('info')."','text':'','showConfirmButton':false,'icon':'info','toast':true,'position':'top-end','showCloseButton':true,'timer':5000});";
							}
						?>
						 	
					</script>
					<form action="<?php echo base_url(); ?>login/auth" method="post">
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="ID Admin" name="idAdmin" value="admin" required>
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-user"></span>
								</div>
							</div>
						</div>
						<div class="input-group mb-3">
							<input type="password" class="form-control" placeholder="Kata Sandi" name="kataSandi" required>
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-lock"></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<button type="submit" class="btn bg-green btn-block">Log In</button>
							</div>
							<!-- /.col -->
						</div>
					</form>
				</div>
				<!-- /.login-card-body -->
			</div>
		</div>
		<!-- /.login-box -->
		<!-- jQuery -->
		<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- AdminLTE App -->
		<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
	</body>
</html>
