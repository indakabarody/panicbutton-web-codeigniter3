<table class="table table-striped">
	<thead>
		<tr>
			<th style="width: 10px">No</th>
			<th>Jenis Laporan</th>
			<th>Nama Pelapor</th>
			<th>No HP</th>
			<th>Koordinat (Lat/Lon)</th>
			<th>Waktu Laporan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$no = 1;
			foreach ($dataAlarm as $alarm) { 
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $alarm->jenis; ?></td>
			<td><?php echo $alarm->namaUser; ?></td>
			<td><?php echo $alarm->noHP; ?></td>
			<td><a href="https://www.google.com/maps/@<?php echo $alarm->latitude; ?>,<?php echo $alarm->longitude; ?>,20z" target="_blank"><?php echo $alarm->latitude; ?>, <?php echo $alarm->longitude; ?></a></td>
			<td><?php echo date("d-m-Y H:i:s", strtotime($alarm->waktu)); ?></td>
			<td>
				<a href="<?php echo base_url(); ?>alarm/confirm/<?php echo $alarm->idAlarm; ?>" class="btn btn-success" title="Konfirmasi" onclick="return confirm('Konfirmasi pertolongan?')"><i class="nav-icon fa fa-check"></i></a>
				<a href="<?php echo base_url(); ?>alarm/reject/<?php echo $alarm->idAlarm; ?>" class="btn btn-danger" title="Tolak" onclick="return confirm('Tolak pertolongan?')"><i class="nav-icon fas fa-times"></i></a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
