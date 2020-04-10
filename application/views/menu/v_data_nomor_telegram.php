<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Data Nomor Telegram</h1>
				</div>
			</div>
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header bg-green">
							<h3 class="card-title">Tabel Data Nomor Telegram</h3>
						</div>
						<div class="card-body">
							<button type="button" class="btn btn-default bg-green" data-toggle="modal" data-target="#modal-create">
							Tambah Data Baru
							</button>
							<div class="card-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th style="width: 10px">No</th>
											<th>Nomor/ID Telegram</th>
											<th>Nama Pemilik</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<?php 
										$no = 1;
										foreach ($dataNomorTelegram as $nomorTelegram) { 
										?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $nomorTelegram->nomorTelegram; ?></td>
										<td><?php echo $nomorTelegram->namaPemilik; ?></td>
										<td>
											<div class="btn-group">
												<a href="#" class="btn btn-success" title="Edit" data-toggle="modal" 
													data-target="#modal-edit-<?php echo $nomorTelegram->idnomorTelegram; ?>"><i class="nav-icon fas fa-edit"></i></button></a>
												<a href="#" class="btn btn-danger" title="Hapus" data-toggle="modal"
													data-target="#modal-delete-<?php echo $nomorTelegram->idnomorTelegram; ?>"><i class="nav-icon fas fa-trash"></i></button></a>
											</div>
										</td>
									</tr>
									<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
		<?php
		foreach ($dataNomorTelegram as $nomorTelegram) {?>
		<div class="modal fade" id="modal-edit-<?php echo $nomorTelegram->idnomorTelegram; ?>">
			<div class="modal-dialog modal-default">
				<form action="<?php echo base_url();?>datanomortelegram/edit" method="post">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Edit Data Nomor Telegram</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group row">
								<label for="namaUser" class="col-sm-2 col-form-label">ID / Nomor telegram</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="nomorTelegram" name="nomorTelegram" value="<?php echo $nomorTelegram->nomorTelegram; ?>" required>
									<input type="hidden" class="form-control" id="idNomorTelegram" name="idNomorTelegram" value="<?php echo $nomorTelegram->idnomorTelegram; ?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="namaPemilik" class="col-sm-2 col-form-label">Nama Pemilik</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="namaPemilik" name="namaPemilik" value="<?php echo $nomorTelegram->namaPemilik; ?>" required>
								</div>
							</div>
						</div>
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
							<button type="submit" class="btn bg-green">Simpan</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</form>
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->
		<div class="modal fade" id="modal-delete-<?php echo $nomorTelegram->idnomorTelegram; ?>">
			<div class="modal-dialog modal-default">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Konfirmasi Hapus Data Nomor Telegram</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p>Anda yakin ingin menghapus data nomor telegram?</p>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
						<a href="<?php echo base_url(); ?>datanomortelegram/delete/<?php echo $nomorTelegram->idnomorTelegram; ?>" class="btn bg-green">Oke</a>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->
		<?php } ?>
		<div class="modal fade" id="modal-create">
			<div class="modal-dialog modal-default">
				<form action="<?php echo base_url();?>datanomortelegram/add" method="post">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Tambah Data Nomor Telegram</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group row">
								<label for="namaUser" class="col-sm-2 col-form-label">ID / Nomor telegram</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="nomorTelegram" name="nomorTelegram" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="namaPemilik" class="col-sm-2 col-form-label">Nama Pemilik</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="namaPemilik" name="namaPemilik" required>
								</div>
							</div>
						</div>
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
							<button type="submit" class="btn bg-green">Simpan</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</form>
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
