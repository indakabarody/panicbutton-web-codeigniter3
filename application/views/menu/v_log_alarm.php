<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Log Alarm</h1>
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
							<h3 class="card-title">Tabel Log Alarm</h3>
						</div>
						<div class="card-body">
							<button type="button" class="btn btn-default bg-green" data-toggle="modal" data-target="#modal-default">
							Cetak Laporan Log Alarm
							</button>
							<div class="card-body">
								<table id="example1" class="table table-striped">
									<thead>
										<tr>
											<th style="width: 10px">No</th>
											<th>Jenis Laporan</th>
											<th>Pelapor</th>
											<th>No HP</th>
											<th>Koordinat (Lat/Lon)</th>
											<th>Waktu Laporan</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$no = 1;
											foreach ($dataLogAlarm as $logAlarm) { 
										?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td><?php echo $logAlarm->jenis ?></td>
											<td><?php echo $logAlarm->namaUser ?></td>
											<td><?php echo $logAlarm->noHP ?></td>
											<td><?php echo $logAlarm->latitude ?>, <?php echo $logAlarm->longitude ?></td>
											<td><?php echo $logAlarm->waktu ?></td>
											<td><?php echo $logAlarm->statusAlarm ?></td>
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
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
