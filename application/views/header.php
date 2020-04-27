<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title id="judul_halaman"></title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/dist/img/PanicButtonLogo.png">
		<!-- DataTables -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
		<!-- Google Font: Source Sans Pro -->
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	</head>
	<body class="hold-transition sidebar-mini">
		<!--SweetAlert-->
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
		<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
				</li>
			</ul>
			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="hidden-xs">Administrator</span>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-change-password">
							<i class="fa fa-edit mr-2"></i> Ubah Kata Sandi
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-logout">
							<i class="fas fa-sign-out-alt mr-2"></i> Log Out
						</a>
					</div>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->
		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="<?php echo base_url(); ?>alarm" class="brand-link bg-green">
			<img src="<?php echo base_url(); ?>assets/dist/img/PanicButtonLogo.png"
				alt="AdminLTE Logo"
				class="brand-image img-circle elevation-3"
				style="opacity: .8">
			<span class="brand-text font-weight-light">RS Panic Button</span>
			</a>
			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="<?php echo base_url(); ?>assets/dist/img/admin.jpg" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="#" class="d-block">Administrator</a>
					</div>
				</div>
				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
							with font-awesome or any other icon font library -->
						<li class="nav-header">MENU UTAMA</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>alarm" class="nav-link">
								<i class="nav-icon fas fa-bell"></i>
								<p>
									Alarm
								</p>
								<p id="jumlah_alarm_sidebar">
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>datapelapor" class="nav-link">
								<i class="nav-icon fas fa-users"></i>
								<p>
									Data Pelapor
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>pesanlaporan" class="nav-link">
								<i class="nav-icon fas fa-comments"></i>
								<p>
									Pesan Laporan
								</p>
								<p id="jumlah_pesan_sidebar">
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>logalarm" class="nav-link">
								<i class="nav-icon fas fa-clipboard"></i>
								<p>
									Log Alarm
								</p>
							</a>
						</li>
						<li class="nav-header">MENU LAINNYA</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>notifikasitelegram" class="nav-link">
								<i class="nav-icon fab fa-telegram"></i>
								<p>
									Notifikasi Telegram
								</p>
							</a>
						</li>
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- /.navbar -->
		<div class="modal fade" id="modal-change-password">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Ubah Kata Sandi
						</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;
						</span>
						</button>
					</div>
					<form action="<?php echo base_url(); ?>login/ubahsandi" class="form-horizontal" method="post">
						<input type="hidden" name="idAdmin" value="admin">
						<div class="card-body">
							<div class="form-group row">
								<label for="kataSandiLama" class="col-sm-2 control-label">Kata Sandi Lama</label>
								<div class="col-sm-10">
									<input type="password" id="kataSandiLama" name="kataSandiLama" class="form-control" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="kataSandi" class="col-sm-2 control-label">Kata Sandi Baru</label>
								<div class="col-sm-10">
									<input type="password" id="kataSandi" name="kataSandi" class="form-control" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="konfirmasiKataSandi" class="col-sm-2 control-label">Ulangi Kata Sandi</label>
								<div class="col-sm-10">
									<input type="password" id="konfirmasiKataSandi" name="konfirmasiKataSandi" class="form-control" required>
								</div>
							</div>
						</div>
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
							<button type="submit" class="btn btn-primary bg-green">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="modal fade" id="modal-logout">
			<div class="modal-dialog modal-default">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Konfirmasi Log Out</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p>Anda yakin ingin log out?</p>
						<input type="text" class="form-control" id="idUser" name="idUser" hidden>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
						<a href="<?php echo base_url(); ?>login/logout" class="btn bg-green">Oke</a>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->
